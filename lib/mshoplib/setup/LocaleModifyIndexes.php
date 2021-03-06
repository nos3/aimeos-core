<?php

/**
 * @copyright Metaways Infosystems GmbH, 2012
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2015
 */


namespace Aimeos\MW\Setup\Task;


/**
 * Modifies indexes in the locale tables.
 */
class LocaleModifyIndexes extends \Aimeos\MW\Setup\Task\Base
{
	private $mysql = array(
		'add' => array(
			'mshop_locale_language' => array(
				'fk_mslocla_siteid' => 'ALTER TABLE "mshop_locale_language" ADD INDEX "fk_mslocla_siteid" ("siteid")'
			)
		),
		'delete' => array(
			'mshop_locale_language' => array(
				'idx_mslocla_sid_status' => 'ALTER TABLE "mshop_locale_language" DROP INDEX "idx_mslocla_sid_status"'
			)
		)
	);


	/**
	 * Returns the list of task names which this task depends on.
	 *
	 * @return array List of task names
	 */
	public function getPreDependencies()
	{
		return array();
	}


	/**
	 * Returns the list of task names which depends on this task.
	 *
	 * @return string[] List of task names
	 */
	public function getPostDependencies()
	{
		return array( 'TablesCreateMShop' );
	}


	/**
	 * Executes the task for MySQL databases.
	 */
	protected function mysql()
	{
		$this->process( $this->mysql );
	}



	/**
	 * Adds and modifies indexes in the locale tables.
	 *
	 * @param array $stmts List of SQL statements to execute for adding columns
	 */
	protected function process( array $stmts )
	{
		$this->msg( sprintf( 'Modifying indexes in mshop_locale tables' ), 0 );
		$this->status( '' );

		foreach( $stmts['add'] as $table => $indexes )
		{
			foreach( $indexes as $index => $stmt )
			{
				$this->msg( sprintf( 'Checking index "%1$s": ', $index ), 1 );

				if( $this->schema->tableExists( $table ) === true
						&& $this->schema->indexExists( $table, $index ) !== true )
				{
					$this->execute( $stmt );
					$this->status( 'added' );
				}
				else
				{
					$this->status( 'OK' );
				}
			}
		}

		foreach( $stmts['delete'] as $table => $indexes )
		{
			foreach( $indexes as $index => $stmt )
			{
				$this->msg( sprintf( 'Checking index "%1$s": ', $index ), 1 );

				if( $this->schema->tableExists( $table ) === true
						&& $this->schema->indexExists( $table, $index ) === true )
				{
					$this->execute( $stmt );
					$this->status( 'dropped' );
				}
				else
				{
					$this->status( 'OK' );
				}
			}
		}
	}
}