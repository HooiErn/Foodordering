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

/* @SitesManager/_gtmTabInstructions.twig */
class __TwigTemplate_281bab6c5e946e5065d93d326768db10 extends Template
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
        echo "<p>";
        echo $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataGoogleTagManagerIntro", "<a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/faq/new-to-piwik/how-do-i-use-matomo-analytics-within-gtm-google-tag-manager/\">", "</a>");
        echo "</p>
<br>
<p>";
        // line 3
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataGoogleTagManagerFollowStepsIntro"), "html", null, true);
        echo "</p>
<ol style=\"list-style: decimal;list-style-position: inside;\">
    <li>";
        // line 5
        echo $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataGTMFollowStep1", "<a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://tagmanager.google.com/\">", "</a>");
        echo "</li>
    <li>";
        // line 6
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataGTMFollowStep2"), "html", null, true);
        echo "</li>
    <li>";
        // line 7
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataGTMFollowStep3"), "html", null, true);
        echo "</li>
    <li>";
        // line 8
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataGTMFollowStep4"), "html", null, true);
        echo "</li>
    <li>";
        // line 9
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataGTMFollowStep5"), "html", null, true);
        echo "</li>
    <li>";
        // line 10
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataGTMFollowStep6"), "html", null, true);
        echo "<br><div><pre vue-directive=\"CoreHome.CopyToClipboard\">";
        echo (isset($context["jsTag"]) || array_key_exists("jsTag", $context) ? $context["jsTag"] : (function () { throw new RuntimeError('Variable "jsTag" does not exist.', 10, $this->source); })());
        echo "</pre></div></li>
    <li>";
        // line 11
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataGTMFollowStep7"), "html", null, true);
        echo "</li>
    <li>";
        // line 12
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataGTMFollowStep8"), "html", null, true);
        echo "</li>
    <li>";
        // line 13
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataGTMFollowStep9"), "html", null, true);
        echo "</li>
    <li>";
        // line 14
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataGTMFollowStep10"), "html", null, true);
        echo "</li>
    <li>";
        // line 15
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataGTMFollowStep11"), "html", null, true);
        echo "</li>
</ol>
<br>
<p>";
        // line 18
        echo $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataGoogleTagManagerFollowStepCompleted", "<strong>", "</strong>");
        echo "</p>
";
    }

    public function getTemplateName()
    {
        return "@SitesManager/_gtmTabInstructions.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  96 => 18,  90 => 15,  86 => 14,  82 => 13,  78 => 12,  74 => 11,  68 => 10,  64 => 9,  60 => 8,  56 => 7,  52 => 6,  48 => 5,  43 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<p>{{ 'SitesManager_SiteWithoutDataGoogleTagManagerIntro'|translate('<a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/faq/new-to-piwik/how-do-i-use-matomo-analytics-within-gtm-google-tag-manager/\">','</a>')|raw }}</p>
<br>
<p>{{ 'SitesManager_SiteWithoutDataGoogleTagManagerFollowStepsIntro'|translate }}</p>
<ol style=\"list-style: decimal;list-style-position: inside;\">
    <li>{{ 'SitesManager_SiteWithoutDataGTMFollowStep1'|translate('<a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://tagmanager.google.com/\">','</a>')|raw }}</li>
    <li>{{ 'SitesManager_SiteWithoutDataGTMFollowStep2'|translate }}</li>
    <li>{{ 'SitesManager_SiteWithoutDataGTMFollowStep3'|translate }}</li>
    <li>{{ 'SitesManager_SiteWithoutDataGTMFollowStep4'|translate }}</li>
    <li>{{ 'SitesManager_SiteWithoutDataGTMFollowStep5'|translate }}</li>
    <li>{{ 'SitesManager_SiteWithoutDataGTMFollowStep6'|translate }}<br><div><pre vue-directive=\"CoreHome.CopyToClipboard\">{{ jsTag|raw }}</pre></div></li>
    <li>{{ 'SitesManager_SiteWithoutDataGTMFollowStep7'|translate }}</li>
    <li>{{ 'SitesManager_SiteWithoutDataGTMFollowStep8'|translate }}</li>
    <li>{{ 'SitesManager_SiteWithoutDataGTMFollowStep9'|translate }}</li>
    <li>{{ 'SitesManager_SiteWithoutDataGTMFollowStep10'|translate }}</li>
    <li>{{ 'SitesManager_SiteWithoutDataGTMFollowStep11'|translate }}</li>
</ol>
<br>
<p>{{ 'SitesManager_SiteWithoutDataGoogleTagManagerFollowStepCompleted'|translate('<strong>','</strong>')|raw }}</p>
", "@SitesManager/_gtmTabInstructions.twig", "/home/u333978671/domains/ctosweb.com/public_html/Food_Order/public/matomo/plugins/SitesManager/templates/_gtmTabInstructions.twig");
    }
}
