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

/* @ProfessionalServices/promoBelowCampaigns.twig */
class __TwigTemplate_429d9d806ff3ea7144b18d5713d25642 extends Template
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
    <br/> <a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/docs/tracking-campaigns/\">Campaign tracking</a> lets you measure the effectiveness of your marketing campaigns such as emails marketing, paid search, banner ads, affiliates links, etc.
    Use the <a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/docs/tracking-campaigns/\">URL Builder tool</a> to create your links with new URL campaign parameters.
    ";
        // line 4
        if ((isset($context["displayMarketingCampaignsReportingAd"]) || array_key_exists("displayMarketingCampaignsReportingAd", $context) ? $context["displayMarketingCampaignsReportingAd"] : (function () { throw new RuntimeError('Variable "displayMarketingCampaignsReportingAd" does not exist.', 4, $this->source); })())) {
            // line 5
            echo "        <br/> Install our <a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://plugins.matomo.org/MarketingCampaignsReporting\">Marketing Campaigns Reporting plugin</a> to get even more campaigns reports and new segments for up to five marketing channels (campaign, source, medium, keyword, content).
    ";
        }
        // line 7
        echo "    ";
        if ((isset($context["multiChannelConversionAttributionAd"]) || array_key_exists("multiChannelConversionAttributionAd", $context) ? $context["multiChannelConversionAttributionAd"] : (function () { throw new RuntimeError('Variable "multiChannelConversionAttributionAd" does not exist.', 7, $this->source); })())) {
            // line 8
            echo "        <br />
        Discover how much each campaign truly contributes to your success by applying attribution models using the <a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://plugins.piwik.org/MarketingCampaignsReporting\">Multi Channel Conversion Attribution</a> premium feature.
    ";
        }
        // line 11
        echo "</p>
";
    }

    public function getTemplateName()
    {
        return "@ProfessionalServices/promoBelowCampaigns.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 11,  51 => 8,  48 => 7,  44 => 5,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<p style=\"margin-top:3em\" class=\" alert-info alert\">Did you know?
    <br/> <a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/docs/tracking-campaigns/\">Campaign tracking</a> lets you measure the effectiveness of your marketing campaigns such as emails marketing, paid search, banner ads, affiliates links, etc.
    Use the <a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/docs/tracking-campaigns/\">URL Builder tool</a> to create your links with new URL campaign parameters.
    {% if displayMarketingCampaignsReportingAd %}
        <br/> Install our <a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://plugins.matomo.org/MarketingCampaignsReporting\">Marketing Campaigns Reporting plugin</a> to get even more campaigns reports and new segments for up to five marketing channels (campaign, source, medium, keyword, content).
    {% endif %}
    {% if multiChannelConversionAttributionAd %}
        <br />
        Discover how much each campaign truly contributes to your success by applying attribution models using the <a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://plugins.piwik.org/MarketingCampaignsReporting\">Multi Channel Conversion Attribution</a> premium feature.
    {% endif %}
</p>
", "@ProfessionalServices/promoBelowCampaigns.twig", "/home/u333978671/domains/ctosweb.com/public_html/Food_Order/public/matomo/plugins/ProfessionalServices/templates/promoBelowCampaigns.twig");
    }
}
