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
class SuperSizedPageHolder extends Page {
    static $allowed_children = array( 'SuperSizedPage' );
    
    static $db = array(
        'ThumbnailWidth' => 'Int',
        'ThumbnailHeight' => 'Int',
        'ThumbnailEffect' => 'Varchar'
    );

    public function populateDefaults() {
        parent::populateDefaults();
        $this->ThumbnailWidth = 250;
        $this->ThumbnailHeight = 130;
        $this->ThumbnailEffect = '-webkit-filter: opacity(50%);';
    }
    
    public function getCMSFields() {
        $fields = parent::getCMSFields();

        $thumbnailEffects = array(
            '' => 'None',
            '-webkit-filter: opacity(50%);' => 'Opacity',
            '-webkit-filter: saturate(3);' => 'Saturate',
            '-webkit-filter: grayscale(100%);' => 'Grayscale',
            '-webkit-filter: contrast(160%);' => 'Contrast',
            '-webkit-filter: blur(3px);' => 'Blur',
            '-webkit-filter: invert(100%);' => 'Invert',
            '-webkit-filter: sepia(100%);' => 'Sepia',
            '-webkit-filter: hue-rotate(180deg);' => 'Huerotate',
        );        
        
        $fields->addFieldsToTab('Root.Main',array( 
                new NumericField('ThumbnailWidth','Thumbnail Width'), 
                new NumericField('ThumbnailHeight','Thumbnail Height'),
                new DropdownField('ThumbnailEffect','Thumbnail Effect',$thumbnailEffects),
                ),
                'Content');
        return $fields;
    }
}