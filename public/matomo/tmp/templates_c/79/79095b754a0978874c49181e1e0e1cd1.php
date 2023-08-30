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

/* @ProfessionalServices/promoSearchKeywords.twig */
class __TwigTemplate_f88b210632dab7dfaaf6e1ee9e0fa1cb extends Template
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
        echo "<p style=\"margin-top:3em;margin-bottom:3em\" class=\" alert-info alert\">Did you know?<br/>
    Use <a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/recommends/search-keywords-performance/\">Search Keywords Performance</a>
    to see all keywords behind 'keyword not defined'.
    All keywords searched by your users on Google, Bing and other search engines will be listed
    and you can even monitor the SEO position of your website in their search results.
</p>
";
    }

    public function getTemplateName()
    {
        return "@ProfessionalServices/promoSearchKeywords.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<p style=\"margin-top:3em;margin-bottom:3em\" class=\" alert-info alert\">Did you know?<br/>
    Use <a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/recommends/search-keywords-performance/\">Search Keywords Performance</a>
    to see all keywords behind 'keyword not defined'.
    All keywords searched by your users on Google, Bing and other search engines will be listed
    and you can even monitor the SEO position of your website in their search results.
</p>
", "@ProfessionalServices/promoSearchKeywords.twig", "/home/u333978671/domains/ctosweb.com/public_html/Food_Order/public/matomo/plugins/ProfessionalServices/templates/promoSearchKeywords.twig");
    }
}
