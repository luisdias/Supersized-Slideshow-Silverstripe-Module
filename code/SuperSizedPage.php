<?php
/*
Copyright (c) 2012 Luis E. S. Dias - www.smartbyte.com.br

Permission is hereby granted, free of charge, to any person obtaining
a copy of this software and associated documentation files (the
"Software"), to deal in the Software without restriction, including
without limitation the rights to use, copy, modify, merge, publish,
distribute, sublicense, and/or sell copies of the Software, and to
permit persons to whom the Software is furnished to do so, subject to
the following conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/
class SuperSizedPage extends Page {

    static $has_one = array ( 
        'Folder' => 'Folder',
        'ThumbnailImage' => 'File'
    );
    
    static $allowed_children = 'none';

    static $db = array(
        'FormatImageName' => 'Boolean',        
        'AutoPlay' => 'Boolean',
        'FitAlways' => 'Boolean',
        'FitLandscape' => 'Boolean',
        'FitPortrait' => 'Boolean',
        'HorizontalCenter' => 'Boolean',
        'ImageProtect' => 'Boolean',
        'KeyboardNav' => 'Boolean',
        'MinHeight' => 'Int',
        'MinWidth' => 'Int',
        'NewWindow' => 'Boolean',
        'PauseHover' => 'Boolean',
        'Performance' => 'Int',
        'Random' => 'Boolean',
        'Slideshow' => 'Boolean',
        'SlideInterval' => 'Int',
        'SlideLinks' => 'Varchar',
        'CodropsSpeed' => 'Int',
        'CodropsEasing' => 'Varchar',
        'CodropsThumbWidth' => 'Int',
        'CodropsThumbHeight' => 'Int',
        'CodropsZoom' => 'Boolean',
        'CodropsZoomRatio' => 'Float',
        'CodropsZoomSpeed' => 'Int',
        'StartSlide' => 'Int',
        'StopLoop' => 'Boolean',
        'ThumbLinks' => 'Boolean',
        'ThumbnailNavigation' => 'Boolean',
        'Transition' => 'Varchar',
        'TransitionSpeed' => 'Int',
        'VerticalCenter' => 'Boolean'
    );

    public function populateDefaults() {
        parent::populateDefaults();
        $this->FormatImageName = 1;
        $this->Autoplay = 1;
        $this->FitAlways = 0;
        $this->FitLandscape = 0;
        $this->FitPortrait = 1;
        $this->HorizontalCenter = 0;
        $this->ImageProtect = 1;
        $this->KeyboardNav = 1;
        $this->NewWindow = 1;
        $this->PauseHover = 0;
        $this->Performance = 1;
        $this->Random = 0;
        $this->Slideshow = 1;
        $this->SlideInterval = 3000;
        $this->SlideLinks = 0;
        $this->CodropsSpeed = 100;
        $this->CodropsEasing = 'jswing';
        $this->CodropsThumbWidth = 250;
        $this->CodropsThumbHeight = 130;
        $this->CodropsZoom = 0;
        $this->CodropsZoomRatio = 1.3;
        $this->CodropsZoomSpeed = 15000;
        $this->StopLoop = 0;
        $this->ThumbLinks = 0;
        $this->ThumbnailNavigation = 0;
        $this->Transition = 1;
        $this->TransitionSpeed = 700;
        $this->VerticalCenter = 1;
    }

    public function getCMSFields() {
        $fields = parent::getCMSFields();        
        $transitionItems = array(
            0 => 'none',
            1 => 'fade',
            2 => 'slideTop',
            3 => 'slideRight',
            4 => 'slideBottom',
            5 => 'slideLeft',
            6 => 'carouselRight',
            7 => 'carouselLeft'
        );
        
        $performanceItems = array(
            0 => 'No adjustments',
            1 => 'Hybrid',
            2 => 'Higher',
            3 => 'Faster'
        );
        
        $slideItems = array(
            0 => 'Disable',
            'num' => 'Numbers',
            'name' => 'Title',
            'blank' => 'Links',
            'codrops' => 'Codrops'
        );
        
        $codropsEasingOptions = array(
            'none' => 'None',
            'jswing' => 'jswing',
            'easeInQuad' => 'InQuad',
            'easeOutQuad' => 'OutQuad',
            'easeInOutQuad' => 'InOutQuad',
            'easeInCubic' => 'InCubic',
            'easeOutCubic' => 'OutCubic',
            'easeInOutCubic' => 'InOutCubic',
            'easeInQuart' => 'InQuart',
            'easeOutQuart' => 'OutQuart',
            'easeInOutQuart' => 'InOutQuart',
            'easeInQuint' => 'InQuint',
            'easeOutQuint' => 'OutQuint',
            'easeInOutQuint' => 'InOutQuint',
            'easeInSine' => 'InSine',
            'easeOutSine' => 'OutSine',
            'easeInOutSine' => 'InOutSine',
            'easeInExpo' => 'InExpo',
            'easeOutExpo' => 'OutExpo',
            'easeInOutExpo' => 'InOutExpo',
            'easeInCirc' => 'InCirc',
            'easeOutCirc' => 'OutCirc',
            'easeInOutCirc' => 'InOutCirc',
            'easeInElastic' => 'InElastic',
            'easeOutElastic' => 'OutElastic',
            'easeInOutElastic' => 'InOutElastic',
            'easeInBack' => 'InBack',
            'easeOutBack' => 'OutBack',
            'easeInOutBack' => 'InOutBack',
            'easeInBounce' => 'InBounce',
            'easeOutBounce' => 'OutBounce',
            'easeInOutBounce' => 'InOutBounce'
        );

        $fields->addFieldsToTab('Root.Content.Options',
            array (
                new CheckboxField('AutoPlay','Auto Play'),
                new CheckboxField('FitAlways','Fit Always'),
                new CheckboxField('FitLandscape','Fit Landscape'),
                new CheckboxField('FitPortrait','Fit Portrait'),
                new CheckboxField('HorizontalCenter','Horizontal Center'),
                new CheckboxField('ImageProtect','Image Protect'),
                new CheckboxField('KeyboardNav','Keyboard Nav'),
                new NumericField('MinHeight','Min Height'),
                new NumericField('MinWidth','Min Width'),
                new CheckboxField('NewWindow','New window'),
                new CheckboxField('PauseHover','Pause Hover'),
                new DropdownField('Performance','Performance',$performanceItems),
                new CheckboxField('Random','Random'),
                new CheckboxField('Slideshow','Slideshow'),
                new NumericField('SlideInterval','Slide Interval'),
                new DropdownField('SlideLinks','Slide Links',$slideItems),

                new NumericField('CodropsSpeed','Codrops Speed'),
                new DropdownField('CodropsEasing','Codrops Easing',$codropsEasingOptions),
                new NumericField('CodropsThumbWidth','Codrops Thumb Width'),
                new NumericField('CodropsThumbHeight','Codrops Thumb Height'),
                new CheckboxField('CodropsZoom','Codrops Zoom'),
                new NumericField('CodropsZoomRatio','Codrops Zoom Ratio'),
                new NumericField('CodropsZoomSpeed','Codrops Zoom Speed'),

                new NumericField('StartSlide','Start Slide'),
                new CheckboxField('StopLoop','Stop Loop'),
                new CheckboxField('ThumbLinks','Thumb Links'),
                new CheckboxField('ThumbnailNavigation','Thumbnail Navigation'),
                new DropdownField('Transition','Transition',$transitionItems),
                new NumericField('TransitionSpeed','Transition Speed'),
                new CheckboxField('VerticalCenter','Vertical Center')
            )
        );
        
      
        $fields->addFieldToTab('Root.Content.Main', 
                new TreeDropdownField('FolderID', 'Select Image Folder', 'Folder'),
                'Content');
        
        $fields->addFieldToTab('Root.Content.Main', 
                new TreeDropdownField('ThumbnailImageID', 'Select image for thumbnail gallery', 'File'),
                'Content');
        
        $fields->addFieldToTab('Root.Content.Main', 
                new CheckboxField('FormatImageName','Format Image File Name (ex: 99-XXX-999.jpg becomes XXX 999)'),
                'Content');        
        
        return $fields;
    }
    
    public function getCMSValidator() { 
        return new RequiredFields('Folder'); 
    }     
}