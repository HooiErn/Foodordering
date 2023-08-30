<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* @ProfessionalServices/promoBelowEvents.twig */
class __TwigTemplate_37e927ee367e0e381ef9350323980f40 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<p style=\"margin-top:3em\" class=\" alert-info alert\">Did you know?
    <br/>Using Events you can measure any user interaction and gain amazing insights into your audience. <a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/docs/event-tracking/\">Learn more</a>.
    <br/> To measure blocks of content such as image galleries, listings or ads: use <a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://developer.matomo.org/guides/content-tracking\">Content Tracking</a> and see exactly which content is viewed and clicked.
    ";
        // line 4
        if ((isset($context["displayMediaAnalyticsAd"]) || array_key_exists("displayMediaAnalyticsAd", $context) ? $context["displayMediaAnalyticsAd"] : (function () { throw new RuntimeError('Variable "displayMediaAnalyticsAd" does not exist.', 4, $this->source); })())) {
            // line 5
            echo "        <br/>When you publish videos or audios, <a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/recommends/media-analytics-website\">Media Analytics gives deep insights into your audience</a> and how they watch your videos or listens to your music.
    ";
        }
        // line 7
        echo "</p>
";
    }

    public function getTemplateName()
    {
        return "@ProfessionalServices/promoBelowEvents.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 7,  44 => 5,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<p style=\"margin-top:3em\" class=\" alert-info alert\">Did you know?
    <br/>Using Events you can measure any user interaction and gain amazing insights into your audience. <a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/docs/event-tracking/\">Learn more</a>.
    <br/> To measure blocks of content such as image galleries, listings or ads: use <a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://developer.matomo.org/guides/content-tracking\">Content Tracking</a> and see exactly which content is viewed and clicked.
    {% if displayMediaAnalyticsAd %}
        <br/>When you publish videos or audios, <a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/recommends/media-analytics-website\">Media Analytics gives deep insights into your audience</a> and how they watch your videos or listens to your music.
    {% endif %}
</p>
", "@ProfessionalServices/promoBelowEvents.twig", "/home/u333978671/domains/ctosweb.com/public_html/Food_Order/public/matomo/plugins/ProfessionalServices/templates/promoBelowEvents.twig");
    }
}
