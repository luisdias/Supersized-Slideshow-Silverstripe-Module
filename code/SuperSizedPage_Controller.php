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
class SuperSizedPage_Controller extends Page_Controller {

    public function calcThumbNailWidth() {
        if ( $this->FolderID == 0 ) {
            $children = $this->Children(); 
            return $children->Count() * 17; 
        } else {
            $images = DataObject::get("Image", "ParentID = '{$this->FolderID}'");
            return count($images) * 17; 
        }
    }
    
    public function getImages() {
        if ( $this->FolderID > 0 ) {
            $folderImages = DataObject::get("Image", "ParentID = '{$this->FolderID}'");
            
            $images = new DataObjectSet('Image');
            
            foreach ($folderImages as $folderImage) {                
                $image = new Image();
                if ( $this->FormatImageName ) {
                    $image->Title = $this->getFormatImageTitle($folderImage->Title);
                } else {
                    $image->Title = $folderImage->Title;
                }
                $image->Name = $folderImage->Name;
                $image->FileName = $folderImage->FileName;
                $images->push($image);
            }
            return $images;
        }
        return false;
    }
    
    public function getFormatImageTitle($imageTitle) {
        $imageTitle = str_replace("-", " ", $imageTitle);
        $extension = strpos($imageTitle,".");
        if ( $extension > 0 )
            $imageTitle = substr($imageTitle, 0, $extension);
        $imageTitle = preg_replace("/^[0-9 ]+(?=[^\d]+)/i", "", $imageTitle);
        return $imageTitle;
    }
}