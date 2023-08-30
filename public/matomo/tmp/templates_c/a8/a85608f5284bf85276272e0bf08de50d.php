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

/* @Transitions/renderPopover.twig */
class __TwigTemplate_5c9228cf5aea15d0386568c5c7c7abe6 extends Template
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
        echo "<div id=\"Transitions_Container\">
    <div id=\"Transitions_CenterBox\" class=\"Transitions_Text\">
        <h2></h2>

        <div class=\"Transitions_CenterBoxMetrics\">
            <p class=\"Transitions_Pageviews Transitions_Margin\">";
        // line 6
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()(twig_get_attribute($this->env, $this->source, (isset($context["translations"]) || array_key_exists("translations", $context) ? $context["translations"] : (function () { throw new RuntimeError('Variable "translations" does not exist.', 6, $this->source); })()), "pageviewsInline", [], "any", false, false, false, 6)), "html", null, true);
        echo "</p>

            <div class=\"Transitions_IncomingTraffic\">
                <h3>";
        // line 9
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("Transitions_IncomingTraffic"), "html", null, true);
        echo "</h3>

                <p class=\"Transitions_PreviousPages\">";
        // line 11
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()(twig_get_attribute($this->env, $this->source, (isset($context["translations"]) || array_key_exists("translations", $context) ? $context["translations"] : (function () { throw new RuntimeError('Variable "translations" does not exist.', 11, $this->source); })()), "fromPreviousPagesInline", [], "any", false, false, false, 11)), "html", null, true);
        echo "</p>

                <p class=\"Transitions_PreviousSiteSearches\">";
        // line 13
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()(twig_get_attribute($this->env, $this->source, (isset($context["translations"]) || array_key_exists("translations", $context) ? $context["translations"] : (function () { throw new RuntimeError('Variable "translations" does not exist.', 13, $this->source); })()), "fromPreviousSiteSearchesInline", [], "any", false, false, false, 13)), "html", null, true);
        echo "</p>

                <p class=\"Transitions_SearchEngines\">";
        // line 15
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()(twig_get_attribute($this->env, $this->source, (isset($context["translations"]) || array_key_exists("translations", $context) ? $context["translations"] : (function () { throw new RuntimeError('Variable "translations" does not exist.', 15, $this->source); })()), "fromSearchEnginesInline", [], "any", false, false, false, 15)), "html", null, true);
        echo "</p>

                <p class=\"Transitions_SocialNetworks\">";
        // line 17
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()(twig_get_attribute($this->env, $this->source, (isset($context["translations"]) || array_key_exists("translations", $context) ? $context["translations"] : (function () { throw new RuntimeError('Variable "translations" does not exist.', 17, $this->source); })()), "fromSocialNetworksInline", [], "any", false, false, false, 17)), "html", null, true);
        echo "</p>

                <p class=\"Transitions_Websites\">";
        // line 19
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()(twig_get_attribute($this->env, $this->source, (isset($context["translations"]) || array_key_exists("translations", $context) ? $context["translations"] : (function () { throw new RuntimeError('Variable "translations" does not exist.', 19, $this->source); })()), "fromWebsitesInline", [], "any", false, false, false, 19)), "html", null, true);
        echo "</p>

                <p class=\"Transitions_Campaigns\">";
        // line 21
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()(twig_get_attribute($this->env, $this->source, (isset($context["translations"]) || array_key_exists("translations", $context) ? $context["translations"] : (function () { throw new RuntimeError('Variable "translations" does not exist.', 21, $this->source); })()), "fromCampaignsInline", [], "any", false, false, false, 21)), "html", null, true);
        echo "</p>

                <p class=\"Transitions_DirectEntries\">";
        // line 23
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()(twig_get_attribute($this->env, $this->source, (isset($context["translations"]) || array_key_exists("translations", $context) ? $context["translations"] : (function () { throw new RuntimeError('Variable "translations" does not exist.', 23, $this->source); })()), "directEntriesInline", [], "any", false, false, false, 23)), "html", null, true);
        echo "</p>
            </div>

            <div class=\"Transitions_OutgoingTraffic\">
                <h3>";
        // line 27
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("Transitions_OutgoingTraffic"), "html", null, true);
        echo "</h3>

                <p class=\"Transitions_FollowingPages\">";
        // line 29
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()(twig_get_attribute($this->env, $this->source, (isset($context["translations"]) || array_key_exists("translations", $context) ? $context["translations"] : (function () { throw new RuntimeError('Variable "translations" does not exist.', 29, $this->source); })()), "toFollowingPagesInline", [], "any", false, false, false, 29)), "html", null, true);
        echo "</p>

                <p class=\"Transitions_FollowingSiteSearches\">";
        // line 31
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()(twig_get_attribute($this->env, $this->source, (isset($context["translations"]) || array_key_exists("translations", $context) ? $context["translations"] : (function () { throw new RuntimeError('Variable "translations" does not exist.', 31, $this->source); })()), "toFollowingSiteSearchesInline", [], "any", false, false, false, 31)), "html", null, true);
        echo "</p>

                <p class=\"Transitions_Downloads\">";
        // line 33
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()(twig_get_attribute($this->env, $this->source, (isset($context["translations"]) || array_key_exists("translations", $context) ? $context["translations"] : (function () { throw new RuntimeError('Variable "translations" does not exist.', 33, $this->source); })()), "downloadsInline", [], "any", false, false, false, 33)), "html", null, true);
        echo "</p>

                <p class=\"Transitions_Outlinks\">";
        // line 35
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()(twig_get_attribute($this->env, $this->source, (isset($context["translations"]) || array_key_exists("translations", $context) ? $context["translations"] : (function () { throw new RuntimeError('Variable "translations" does not exist.', 35, $this->source); })()), "outlinksInline", [], "any", false, false, false, 35)), "html", null, true);
        echo "</p>

                <p class=\"Transitions_Exits\">";
        // line 37
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()(twig_get_attribute($this->env, $this->source, (isset($context["translations"]) || array_key_exists("translations", $context) ? $context["translations"] : (function () { throw new RuntimeError('Variable "translations" does not exist.', 37, $this->source); })()), "exitsInline", [], "any", false, false, false, 37)), "html", null, true);
        echo "</p>
            </div>
        </div>
    </div>
    <div id=\"Transitions_Loops\" class=\"Transitions_Text\">
        ";
        // line 42
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()(twig_get_attribute($this->env, $this->source, (isset($context["translations"]) || array_key_exists("translations", $context) ? $context["translations"] : (function () { throw new RuntimeError('Variable "translations" does not exist.', 42, $this->source); })()), "loopsInline", [], "any", false, false, false, 42)), "html", null, true);
        echo "
    </div>
    <div id=\"Transitions_Canvas_Background_Left\" class=\"Transitions_Canvas_Container\"></div>
    <div id=\"Transitions_Canvas_Background_Right\" class=\"Transitions_Canvas_Container\"></div>
    <div id=\"Transitions_Canvas_Left\" class=\"Transitions_Canvas_Container\"></div>
    <div id=\"Transitions_Canvas_Right\" class=\"Transitions_Canvas_Container\"></div>
    <div id=\"Transitions_Canvas_Loops\" class=\"Transitions_Canvas_Container\"></div>
</div>

<div class=\"dataTableWrapper\" id=\"transition-export-actions\" style=\"display:none\">
    <div class=\"dataTableFeatures\">
        <div class=\"dataTableFooterNavigation\">
            <div class=\"dataTableControls\">
                <div class=\"row\">
                    <a class=\"dataTableAction\" href=\"javascript:;\" transition-exporter>
                        <span class=\"icon-export\"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script type=\"text/javascript\">
    var Piwik_Transitions_Translations = {
        ";
        // line 67
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["translations"]) || array_key_exists("translations", $context) ? $context["translations"] : (function () { throw new RuntimeError('Variable "translations" does not exist.', 67, $this->source); })()));
        foreach ($context['_seq'] as $context["internalKey"] => $context["translation"]) {
            // line 68
            echo "            \"";
            echo \Piwik\piwik_escape_filter($this->env, $context["internalKey"], "html", null, true);
            echo "\": \"";
            echo \Piwik\piwik_escape_filter($this->env, $context["translation"], "html", null, true);
            echo "\",
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['internalKey'], $context['translation'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 70
        echo "        \"\": \"\"
    };
    var tea = \$('#transition-export-actions');
    if (!tea.parent().hasClass('popoverContainer'))
        tea.show();
</script>";
    }

    public function getTemplateName()
    {
        return "@Transitions/renderPopover.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  168 => 70,  157 => 68,  153 => 67,  125 => 42,  117 => 37,  112 => 35,  107 => 33,  102 => 31,  97 => 29,  92 => 27,  85 => 23,  80 => 21,  75 => 19,  70 => 17,  65 => 15,  60 => 13,  55 => 11,  50 => 9,  44 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div id=\"Transitions_Container\">
    <div id=\"Transitions_CenterBox\" class=\"Transitions_Text\">
        <h2></h2>

        <div class=\"Transitions_CenterBoxMetrics\">
            <p class=\"Transitions_Pageviews Transitions_Margin\">{{ translations.pageviewsInline|translate }}</p>

            <div class=\"Transitions_IncomingTraffic\">
                <h3>{{ 'Transitions_IncomingTraffic'|translate }}</h3>

                <p class=\"Transitions_PreviousPages\">{{ translations.fromPreviousPagesInline|translate }}</p>

                <p class=\"Transitions_PreviousSiteSearches\">{{ translations.fromPreviousSiteSearchesInline|translate }}</p>

                <p class=\"Transitions_SearchEngines\">{{ translations.fromSearchEnginesInline|translate }}</p>

                <p class=\"Transitions_SocialNetworks\">{{ translations.fromSocialNetworksInline|translate }}</p>

                <p class=\"Transitions_Websites\">{{ translations.fromWebsitesInline|translate }}</p>

                <p class=\"Transitions_Campaigns\">{{ translations.fromCampaignsInline|translate }}</p>

                <p class=\"Transitions_DirectEntries\">{{ translations.directEntriesInline|translate }}</p>
            </div>

            <div class=\"Transitions_OutgoingTraffic\">
                <h3>{{ 'Transitions_OutgoingTraffic'|translate }}</h3>

                <p class=\"Transitions_FollowingPages\">{{ translations.toFollowingPagesInline|translate }}</p>

                <p class=\"Transitions_FollowingSiteSearches\">{{ translations.toFollowingSiteSearchesInline|translate }}</p>

                <p class=\"Transitions_Downloads\">{{ translations.downloadsInline|translate }}</p>

                <p class=\"Transitions_Outlinks\">{{ translations.outlinksInline|translate }}</p>

                <p class=\"Transitions_Exits\">{{ translations.exitsInline|translate }}</p>
            </div>
        </div>
    </div>
    <div id=\"Transitions_Loops\" class=\"Transitions_Text\">
        {{ translations.loopsInline|translate }}
    </div>
    <div id=\"Transitions_Canvas_Background_Left\" class=\"Transitions_Canvas_Container\"></div>
    <div id=\"Transitions_Canvas_Background_Right\" class=\"Transitions_Canvas_Container\"></div>
    <div id=\"Transitions_Canvas_Left\" class=\"Transitions_Canvas_Container\"></div>
    <div id=\"Transitions_Canvas_Right\" class=\"Transitions_Canvas_Container\"></div>
    <div id=\"Transitions_Canvas_Loops\" class=\"Transitions_Canvas_Container\"></div>
</div>

<div class=\"dataTableWrapper\" id=\"transition-export-actions\" style=\"display:none\">
    <div class=\"dataTableFeatures\">
        <div class=\"dataTableFooterNavigation\">
            <div class=\"dataTableControls\">
                <div class=\"row\">
                    <a class=\"dataTableAction\" href=\"javascript:;\" transition-exporter>
                        <span class=\"icon-export\"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script type=\"text/javascript\">
    var Piwik_Transitions_Translations = {
        {% for internalKey, translation in translations %}
            \"{{ internalKey }}\": \"{{ translation }}\",
        {% endfor %}
        \"\": \"\"
    };
    var tea = \$('#transition-export-actions');
    if (!tea.parent().hasClass('popoverContainer'))
        tea.show();
</script>", "@Transitions/renderPopover.twig", "/home/u333978671/domains/ctosweb.com/public_html/Food_Order/public/matomo/plugins/Transitions/templates/renderPopover.twig");
    }
}
