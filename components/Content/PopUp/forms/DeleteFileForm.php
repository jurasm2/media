<?php

namespace Netstars\Media\Components\Content\PopUp;

class DeleteFileForm extends BaseForm {

    public function __construct($parent, $name) {
        parent::__construct($parent, $name);        
        
        $fileId = $this->parent->getId();
        $this->addSubmit('send', 'OK');
        
        $this->addHidden('fileId', $fileId);
        
        $this->onSuccess[] = array($this, 'formSubmited');  
    }

    
    public function formSubmited($form) {
        
        $values = $form->getValues();
        
        $media = $this->lookup('Netstars\\Media');
        
        $this->presenter->mediaManagerService->deleteFile($values['fileId'], $media->getCurrentSection());
        
        $media->invalidateControl();
       
    }
    
}