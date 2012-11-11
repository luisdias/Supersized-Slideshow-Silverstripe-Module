<!-- Silverstripe module version by : Luis E. S. Dias -->
$Content
<div id="supersized-thumbs">
    <ul class="supersized-thumbs">
        <% control Children %>
            <li>                
                <a href="$Link" class="supersized-thumb">
                    <span class="title">$Title</span>
                    <img src="$ThumbnailImage.URL" width="$Top.ThumbnailWidth" height="$Top.ThumbnailHeight" />
                </a>
            </li>        
        <% end_control %>
    </ul>
</div>