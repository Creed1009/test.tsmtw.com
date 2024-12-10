<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Setting_General extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'setting_general_id' => array(
                                'type' => 'int',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'setting_general_name' => array(
                                'type' => 'varchar',
                                'constraint' => '255',
                        ),
                        'setting_general_value' => array(
                                'type' => 'varchar',
                                'constraint' => '255',
                        ),
                        
                ));
                $this->dbforge->add_key('setting_general_id', TRUE);
                $this->dbforge->create_table('setting_general');

                $data = array(
                        array(
                                'setting_general_name'  => 'name',
                                'setting_general_value' => ''
                        ),
                        array(
                                'setting_general_name'  => 'short_name',
                                'setting_general_value' => ''
                        ),
                        array(
                                'setting_general_name'  => 'VAT_number',
                                'setting_general_value' => ''
                        ),
                        array(
                                'setting_general_name'  => 'contact_person',
                                'setting_general_value' => ''
                        ),
                        array(
                                'setting_general_name'  => 'phone1',
                                'setting_general_value' => ''
                        ),
                        array(
                                'setting_general_name'  => 'cellphone1',
                                'setting_general_value' => ''
                        ),
                        array(
                                'setting_general_name'  => 'fax',
                                'setting_general_value' => ''
                        ),
                        array(
                                'setting_general_name'  => 'address',
                                'setting_general_value' => ''
                        ),
                        array(
                                'setting_general_name'  => 'email',
                                'setting_general_value' => ''
                        ),
                        array(
                                'setting_general_name'  => 'logo',
                                'setting_general_value' => ''
                        ),
                        array(
                                'setting_general_name'  => 'per_page',
                                'setting_general_value' => '10'
                        ),
                );
                $this->db->insert_batch('setting_general', $data);
        }

        public function down()
        {
                $this->dbforge->drop_table('setting_general');
        }
}