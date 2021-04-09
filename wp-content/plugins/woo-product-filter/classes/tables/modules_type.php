<?php
class tableModules_typeWpf extends tableWpf {
    public function __construct() {
        $this->_table = '@__modules_type';
        $this->_id = 'id';     /*Let's associate it with posts*/
        $this->_alias = 'sup_m_t';
        $this->_addField($this->_id, 'text', 'int', '', __('ID', WPF_LANG_CODE))->
                _addField('label', 'text', 'varchar', '', __('Label', WPF_LANG_CODE), 128);
    }
}