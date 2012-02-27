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
    
    static $allowed_children = array(
        'SuperSizedImage'
    );

    static $db = array(
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
        $this->StopLoop = 0;
        $this->ThumbLinks = 0;
        $this->ThumbnailNavigation = 0;
        $this->Transition = 1;
        $this->TransitionSpeed = 700;
        $this->VerticalCenter = 1;
    }

    public function getCMSFields() {
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
            'blank' => 'Links'
        );
        $fields = parent::getCMSFields();
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
                    new DropdownField('Performance','performance',$performanceItems),
                    new CheckboxField('Random','Random'),
                    new CheckboxField('Slideshow','Slideshow'),
                    new NumericField('SlideInterval','Slide Interval'),
                    new DropdownField('SlideLinks','slide_links',$slideItems),
                    new NumericField('StartSlide','Start Slide'),
                    new CheckboxField('StopLoop','Stop Loop'),
                    new CheckboxField('ThumbLinks','Thumb Links'),
                    new CheckboxField('ThumbnailNavigation','Thumbnail Navigation'),
                    new DropdownField('Transition','transition',$transitionItems),
                    new NumericField('TransitionSpeed','Transition Speed'),
                    new CheckboxField('VerticalCenter','Vertical Center')
                )
        );
        return $fields;
    }
}

class SuperSizedPage_Controller extends Page_Controller {
    
}