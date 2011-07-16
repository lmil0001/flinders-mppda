<div id="slider-wrapper">
    <div id="slider" class="nivoSlider">
        <% control SliderImages %>
        <a href="$Link" title="$Title">
            <img <% control Image %>src="$SetSize(800, 250).URL" alt="$Title" <% end_control %> title="$Caption" />
        </a>
        <% end_control %>
    </div>
</div>
<div id="content" class="typography">
    <div id="fp_wrap">
        $Content
        <% include HomePageItems %>
    </div>
</div>