<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2016
 */


return array(
<<<<<<< HEAD
	'sequence' => array(
		'seq_maque_id' => function ( \Doctrine\DBAL\Schema\Schema $schema ) {

			$schema->createSequence( 'seq_maque_id' );

			return $schema;
		}
	),
=======
>>>>>>> a730b3c97b0dfdb987ac242f82095ef6a2a3c997
	'table' => array(
		'madmin_queue' => function ( \Doctrine\DBAL\Schema\Schema $schema ) {

			$table = $schema->createTable( 'madmin_queue' );

			$table->addColumn( 'id', 'bigint', array( 'autoincrement' => true ) );
			$table->addColumn( 'queue', 'string', array( 'length' => 255 ) );
			$table->addColumn( 'cname', 'string', array( 'length' => 32 ) );
			$table->addColumn( 'rtime', 'datetime', array() );
			$table->addColumn( 'message', 'text', array( 'length' => 0xffff ) );

			$table->setPrimaryKey( array( 'id' ), 'pk_maque_id' );
			$table->addIndex( array( 'queue', 'cname', 'rtime' ), 'idx_maque_queue_cname_rtime' );

			return $schema;
		},
	),
);
