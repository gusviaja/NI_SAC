<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Criatabelas_chamados extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'codigo' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '12',
                        ),
                        'created_at' => array(
                                'type' => 'DATETIME',
                                'default'=>`CURRENT_TIMESTAMP`,

                        ),
                        'updated_at' => array(
                                'type' => 'DATETIME',
                                'default'=>"CURRENT_TIMESTAMP",
                                
                                   
                        ),
                        'criador_id'=>array(
                             'type'=>'INT',
                             'constraint'=>12,   
                        ),
                        'atendente_id'=>array(
                                'type'=>'INT',
                                'constraint'=>12,   
                           ),
                        'status' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 255,
                        ),
                        'assunto' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 255,
                        ),
                        'categoria' => array(
                                'type' => 'TEXT',
                                'constraint' => 255,
                        ),
                        
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('chamados');
        }

        public function down()
        {
                $this->dbforge->drop_table('chamados');
        }
}