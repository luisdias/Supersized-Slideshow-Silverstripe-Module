<!-- Silverstripe module version by : Luis E. S. Dias -->
<style>
     ul.supersized-thumbs li {
        width: {$ThumbnailWidth}px;
        height: {$ThumbnailHeight}px;
     }
     .supersized-thumbs img {
         $ThumbnailEffect
     }
</style>
$Content
<div id="supersized-thumbs">
    <ul class="supersized-thumbs">
        <% loop Children %>
            <li>                
                <a href="$Link" class="supersized-thumb">
                    <span class="title">$Title</span>
                    <% with ThumbnailImage %>
                        $SetWidth(Top.ThumbnailWidth)
                    <% end_with %>
                </a>
            </li>        
        <% end_loop %>
    </ul>
</div>