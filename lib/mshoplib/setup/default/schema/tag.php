<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2016
 */


return array(
<<<<<<< HEAD
	'sequence' => array(
		'seq_mstag_id' => function ( \Doctrine\DBAL\Schema\Schema $schema ) {

			$schema->createSequence( 'seq_mstag_id' );
			return $schema;
		},
		'seq_mstagty_id' => function ( \Doctrine\DBAL\Schema\Schema $schema ) {

			$schema->createSequence( 'seq_mstagty_id' );
			return $schema;
		},
	),
=======
>>>>>>> a730b3c97b0dfdb987ac242f82095ef6a2a3c997
	'table' => array(
		'mshop_tag_type' => function ( \Doctrine\DBAL\Schema\Schema $schema ) {

			$table = $schema->createTable( 'mshop_tag_type' );

			$table->addColumn( 'id', 'integer', array( 'autoincrement' => true ) );
			$table->addColumn( 'siteid', 'integer', array() );
			$table->addColumn( 'domain', 'string', array( 'length' => 32 ) );
<<<<<<< HEAD
			$table->addColumn( 'code', 'string', array( 'length' => 32, 'customSchemaOptions' => array( 'collation' => 'utf8_bin' ) ) );
=======
			$table->addColumn( 'code', 'string', array( 'length' => 32 ) );
>>>>>>> a730b3c97b0dfdb987ac242f82095ef6a2a3c997
			$table->addColumn( 'label', 'string', array( 'length' => 255 ) );
			$table->addColumn( 'status', 'smallint', array() );
			$table->addColumn( 'mtime', 'datetime', array() );
			$table->addColumn( 'ctime', 'datetime', array() );
			$table->addColumn( 'editor', 'string', array( 'length' => 255 ) );

			$table->setPrimaryKey( array( 'id' ), 'pk_mstagty_id' );
			$table->addUniqueIndex( array( 'siteid', 'domain', 'code' ), 'unq_mstagty_sid_dom_code' );
			$table->addIndex( array( 'siteid', 'status' ), 'idx_mstagty_sid_status' );
			$table->addIndex( array( 'siteid', 'label' ), 'idx_mstagty_sid_label' );
			$table->addIndex( array( 'siteid', 'code' ), 'idx_mstagty_sid_code' );

			return $schema;
		},

		'mshop_tag' => function ( \Doctrine\DBAL\Schema\Schema $schema ) {

			$table = $schema->createTable( 'mshop_tag' );

			$table->addColumn( 'id', 'integer', array( 'autoincrement' => true ) );
			$table->addColumn( 'siteid', 'integer', array() );
			$table->addColumn( 'typeid', 'integer', array() );
			$table->addColumn( 'langid', 'string', array( 'length' => 5 ) );
			$table->addColumn( 'label', 'string', array( 'length' => 255 ) );
<<<<<<< HEAD
			$table->addColumn( 'config', 'text', array( 'length' => 0xffff ) );
=======
>>>>>>> a730b3c97b0dfdb987ac242f82095ef6a2a3c997
			$table->addColumn( 'mtime', 'datetime', array() );
			$table->addColumn( 'ctime', 'datetime', array() );
			$table->addColumn( 'editor', 'string', array('length' => 255 ) );

			$table->setPrimaryKey( array( 'id' ), 'pk_mstag_id' );
			$table->addUniqueIndex( array( 'siteid', 'typeid', 'langid', 'label' ), 'unq_mstag_sid_tid_lid_label' );
			$table->addIndex( array( 'siteid', 'label' ), 'idx_mstag_sid_label' );
			$table->addIndex( array( 'siteid', 'langid' ), 'idx_mstag_sid_langid' );

			$table->addForeignKeyConstraint( 'mshop_tag_type', array( 'typeid' ), array( 'id' ),
				array( 'onUpdate' => 'CASCADE', 'onDelete' => 'CASCADE' ), 'fk_mstag_typeid' );

			return $schema;
		},
	),
);
