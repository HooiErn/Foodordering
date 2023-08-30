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

/* @ProfessionalServices/promoSEOWebVitals.twig */
class __TwigTemplate_de868ceb7e33aaab4abacb616d298460 extends Template
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
        echo "<p class=\"alert-info alert\">Did you know?<br />
    Use
    <a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/recommends/seo-web-vitals/\">
        SEO Web Vitals
    </a>
    to improve your website performance, rank higher in search results and optimise your visitor
    experience with SEO Web Vitals.
</p>
";
    }

    public function getTemplateName()
    {
        return "@ProfessionalServices/promoSEOWebVitals.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<p class=\"alert-info alert\">Did you know?<br />
    Use
    <a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/recommends/seo-web-vitals/\">
        SEO Web Vitals
    </a>
    to improve your website performance, rank higher in search results and optimise your visitor
    experience with SEO Web Vitals.
</p>
", "@ProfessionalServices/promoSEOWebVitals.twig", "/home/u333978671/domains/ctosweb.com/public_html/Food_Order/public/matomo/plugins/ProfessionalServices/templates/promoSEOWebVitals.twig");
    }
}
