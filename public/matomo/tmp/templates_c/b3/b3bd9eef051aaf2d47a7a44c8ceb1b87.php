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

/* @SitesManager/_siteWithoutDataTabs.twig */
class __TwigTemplate_eb58af5db72d43fb288e823175c86efc extends Template
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
        echo "<script type=\"text/javascript\">
    \$(document).ready(function(){
        \$('.tabs').tabs();
    });
</script>

";
        // line 7
        $context["columnClass"] = (((isset($context["activeTab"]) || array_key_exists("activeTab", $context) ? $context["activeTab"] : (function () { throw new RuntimeError('Variable "activeTab" does not exist.', 7, $this->source); })())) ? ("s2") : ("s3"));
        // line 8
        echo "
<div class=\"row no-data-tabs-main-div\">
    <div class=\"col s12 tabs-row\">
        <ul class=\"tabs no-data-screen-ul-tabs\">
            <li class=\"tab col ";
        // line 12
        echo \Piwik\piwik_escape_filter($this->env, (isset($context["columnClass"]) || array_key_exists("columnClass", $context) ? $context["columnClass"] : (function () { throw new RuntimeError('Variable "columnClass" does not exist.', 12, $this->source); })()), "html", null, true);
        echo "\"><a ";
        if (((((isset($context["siteType"]) || array_key_exists("siteType", $context) ? $context["siteType"] : (function () { throw new RuntimeError('Variable "siteType" does not exist.', 12, $this->source); })()) != twig_constant("Piwik\\Plugins\\SitesManager\\SitesManager::SITE_TYPE_UNKNOWN")) && ((isset($context["consentManagerName"]) || array_key_exists("consentManagerName", $context) ? $context["consentManagerName"] : (function () { throw new RuntimeError('Variable "consentManagerName" does not exist.', 12, $this->source); })()) == false)) && ((isset($context["activeTab"]) || array_key_exists("activeTab", $context) ? $context["activeTab"] : (function () { throw new RuntimeError('Variable "activeTab" does not exist.', 12, $this->source); })()) == ""))) {
            echo " class=\"active\" ";
        }
        echo " href=\"#integrations\">";
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_Integrations"), "html", null, true);
        echo "</a></li>
            <li class=\"tab col ";
        // line 13
        echo \Piwik\piwik_escape_filter($this->env, (isset($context["columnClass"]) || array_key_exists("columnClass", $context) ? $context["columnClass"] : (function () { throw new RuntimeError('Variable "columnClass" does not exist.', 13, $this->source); })()), "html", null, true);
        echo "\"><a ";
        if (((((isset($context["siteType"]) || array_key_exists("siteType", $context) ? $context["siteType"] : (function () { throw new RuntimeError('Variable "siteType" does not exist.', 13, $this->source); })()) == twig_constant("Piwik\\Plugins\\SitesManager\\SitesManager::SITE_TYPE_UNKNOWN")) && ((isset($context["activeTab"]) || array_key_exists("activeTab", $context) ? $context["activeTab"] : (function () { throw new RuntimeError('Variable "activeTab" does not exist.', 13, $this->source); })()) == "")) || (isset($context["consentManagerName"]) || array_key_exists("consentManagerName", $context) ? $context["consentManagerName"] : (function () { throw new RuntimeError('Variable "consentManagerName" does not exist.', 13, $this->source); })()))) {
            echo " class=\"active\" ";
        }
        echo " href=\"#tracking-code\">";
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CoreAdminHome_TrackingCode"), "html", null, true);
        echo "</a></li>
            <li class=\"tab col ";
        // line 14
        echo \Piwik\piwik_escape_filter($this->env, (isset($context["columnClass"]) || array_key_exists("columnClass", $context) ? $context["columnClass"] : (function () { throw new RuntimeError('Variable "columnClass" does not exist.', 14, $this->source); })()), "html", null, true);
        echo "\"><a href=\"#mtm\">";
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataMatomoTagManager"), "html", null, true);
        echo "</a></li>
            ";
        // line 15
        if ((isset($context["gtmUsed"]) || array_key_exists("gtmUsed", $context) ? $context["gtmUsed"] : (function () { throw new RuntimeError('Variable "gtmUsed" does not exist.', 15, $this->source); })())) {
            // line 16
            echo "                <li class=\"tab col s2\"><a ";
            if (((isset($context["activeTab"]) || array_key_exists("activeTab", $context) ? $context["activeTab"] : (function () { throw new RuntimeError('Variable "activeTab" does not exist.', 16, $this->source); })()) == "gtm")) {
                echo " class=\"active\" ";
            }
            echo " href=\"#google-tag-manager\">";
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataGoogleTagManager"), "html", null, true);
            echo "</a></li>
            ";
        }
        // line 18
        echo "            ";
        if (((isset($context["cms"]) || array_key_exists("cms", $context) ? $context["cms"] : (function () { throw new RuntimeError('Variable "cms" does not exist.', 18, $this->source); })()) == "wordpress")) {
            // line 19
            echo "                <li class=\"tab col s2\"><a ";
            if (((isset($context["activeTab"]) || array_key_exists("activeTab", $context) ? $context["activeTab"] : (function () { throw new RuntimeError('Variable "activeTab" does not exist.', 19, $this->source); })()) == "wordpress")) {
                echo " class=\"active\" ";
            }
            echo " href=\"#wordpress\">WordPress</a></li>
            ";
        }
        // line 21
        echo "            ";
        if ((isset($context["cloudflare"]) || array_key_exists("cloudflare", $context) ? $context["cloudflare"] : (function () { throw new RuntimeError('Variable "cloudflare" does not exist.', 21, $this->source); })())) {
            // line 22
            echo "                <li class=\"tab col s2\"><a ";
            if (((isset($context["activeTab"]) || array_key_exists("activeTab", $context) ? $context["activeTab"] : (function () { throw new RuntimeError('Variable "activeTab" does not exist.', 22, $this->source); })()) == "cloudflare")) {
                echo " class=\"active\" ";
            }
            echo " href=\"#cloudflare\">Cloudflare</a></li>
            ";
        }
        // line 24
        echo "            ";
        if (((isset($context["jsFramework"]) || array_key_exists("jsFramework", $context) ? $context["jsFramework"] : (function () { throw new RuntimeError('Variable "jsFramework" does not exist.', 24, $this->source); })()) == "vue")) {
            // line 25
            echo "                <li class=\"tab col s2\"><a ";
            if (((isset($context["activeTab"]) || array_key_exists("activeTab", $context) ? $context["activeTab"] : (function () { throw new RuntimeError('Variable "activeTab" does not exist.', 25, $this->source); })()) == "vue")) {
                echo " class=\"active\" ";
            }
            echo " href=\"#vue\">Vue.js</a></li>
            ";
        }
        // line 27
        echo "            ";
        if (((isset($context["jsFramework"]) || array_key_exists("jsFramework", $context) ? $context["jsFramework"] : (function () { throw new RuntimeError('Variable "jsFramework" does not exist.', 27, $this->source); })()) == "react")) {
            // line 28
            echo "                <li class=\"tab col s2\"><a ";
            if (((isset($context["activeTab"]) || array_key_exists("activeTab", $context) ? $context["activeTab"] : (function () { throw new RuntimeError('Variable "activeTab" does not exist.', 28, $this->source); })()) == "react")) {
                echo " class=\"active\" ";
            }
            echo " href=\"#react\">React.js</a></li>
            ";
        }
        // line 30
        echo "            ";
        if ((isset($context["tagManagerActive"]) || array_key_exists("tagManagerActive", $context) ? $context["tagManagerActive"] : (function () { throw new RuntimeError('Variable "tagManagerActive" does not exist.', 30, $this->source); })())) {
            // line 31
            echo "                <li class=\"tab col ";
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["columnClass"]) || array_key_exists("columnClass", $context) ? $context["columnClass"] : (function () { throw new RuntimeError('Variable "columnClass" does not exist.', 31, $this->source); })()), "html", null, true);
            echo "\"><a href=\"#spa\">SPA / PWA</a></li>
            ";
        }
        // line 33
        echo "            <li class=\"tab col ";
        echo \Piwik\piwik_escape_filter($this->env, (isset($context["columnClass"]) || array_key_exists("columnClass", $context) ? $context["columnClass"] : (function () { throw new RuntimeError('Variable "columnClass" does not exist.', 33, $this->source); })()), "html", null, true);
        echo "\"><a href=\"#other\">";
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataOtherWays"), "html", null, true);
        echo "</a></li>
        </ul>
    </div>

    <div id=\"integrations\" class=\"col s12\">
        ";
        // line 38
        if ((isset($context["instruction"]) || array_key_exists("instruction", $context) ? $context["instruction"] : (function () { throw new RuntimeError('Variable "instruction" does not exist.', 38, $this->source); })())) {
            // line 39
            echo "            <p>";
            echo (isset($context["instruction"]) || array_key_exists("instruction", $context) ? $context["instruction"] : (function () { throw new RuntimeError('Variable "instruction" does not exist.', 39, $this->source); })());
            echo "</p>

            ";
            // line 41
            if ((isset($context["gtmUsed"]) || array_key_exists("gtmUsed", $context) ? $context["gtmUsed"] : (function () { throw new RuntimeError('Variable "gtmUsed" does not exist.', 41, $this->source); })())) {
                // line 42
                echo "                <p>";
                echo $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataDetectedGtm", twig_capitalize_string_filter($this->env, (isset($context["siteType"]) || array_key_exists("siteType", $context) ? $context["siteType"] : (function () { throw new RuntimeError('Variable "siteType" does not exist.', 42, $this->source); })())), "<a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/faq/new-to-piwik/how-do-i-use-matomo-analytics-within-gtm-google-tag-manager\">", "</a>");
                echo "</p>
            ";
            }
            // line 44
            echo "
            <p>";
            // line 45
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataOtherIntegrations"), "html", null, true);
            echo ": ";
            echo $this->env->getFilter('translate')->getCallable()("CoreAdminHome_JSTrackingIntro3a", "<a href=\"https://matomo.org/integrate/\" rel=\"noreferrer noopener\" target=\"_blank\">", "</a>");
            echo "</p>
        ";
        } else {
            // line 47
            echo "            <p>";
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_InstallationGuidesIntro"), "html", null, true);
            echo "

            <p>
                <a target=\"_blank\" rel=\"noreferrer noopener\" href='https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-wordpress/'>WordPress</a>
                | <a target=\"_blank\" rel=\"noreferrer noopener\" href='https://matomo.org/faq/new-to-piwik/how-do-i-integrate-matomo-with-squarespace-website/'>Squarespace</a>
                | <a target=\"_blank\" rel=\"noreferrer noopener\" href='https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-analytics-tracking-code-on-wix/'>Wix</a>
                | <a target=\"_blank\" rel=\"noreferrer noopener\" href='https://matomo.org/faq/how-to-install/faq_19424/'>SharePoint</a>
                | <a target=\"_blank\" rel=\"noreferrer noopener\" href='https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-analytics-tracking-code-on-joomla/'>Joomla</a>
                | <a target=\"_blank\" rel=\"noreferrer noopener\" href='https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-my-shopify-store/'>Shopify</a>
                | <a target=\"_blank\" rel=\"noreferrer noopener\" href='https://matomo.org/faq/new-to-piwik/how-do-i-use-matomo-analytics-within-gtm-google-tag-manager/'>Google Tag Manager</a>
                | <a target=\"_blank\" rel=\"noreferrer noopener\" href='https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-my-cloudflare-setup/'>Cloudflare</a>
                | <a target=\"_blank\" rel=\"noreferrer noopener\" href='https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-websites-that-use-vue-js/'>Vue</a>
                | <a target=\"_blank\" rel=\"noreferrer noopener\" href='https://matomo.org/faq/new-to-piwik/how-do-i-start-tracking-data-with-matomo-on-websites-that-use-react/'>React</a>
            </p>

            <p>";
            // line 62
            echo $this->env->getFilter('translate')->getCallable()("CoreAdminHome_JSTrackingIntro3a", "<a href=\"https://matomo.org/integrate/\" rel=\"noreferrer noopener\" target=\"_blank\">", "</a>");
            echo "</p>
            <p>";
            // line 63
            echo $this->env->getFilter('translate')->getCallable()("CoreAdminHome_JSTrackingIntro3b");
            echo "</p>
            <br>
            <p>";
            // line 65
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_ExtraInformationNeeded"), "html", null, true);
            echo "</p>
            <p>Matomo URL: <code piwik-select-on-focus>";
            // line 66
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["piwikUrl"]) || array_key_exists("piwikUrl", $context) ? $context["piwikUrl"] : (function () { throw new RuntimeError('Variable "piwikUrl" does not exist.', 66, $this->source); })()), "html", null, true);
            echo "</code></p>
            <p>";
            // line 67
            echo $this->env->getFilter('translate')->getCallable()("SitesManager_EmailInstructionsYourSiteId", (("<code piwik-select-on-focus>" . (isset($context["idSite"]) || array_key_exists("idSite", $context) ? $context["idSite"] : (function () { throw new RuntimeError('Variable "idSite" does not exist.', 67, $this->source); })())) . "</code>"));
            echo "</p>
        ";
        }
        // line 69
        echo "    </div>

    <div id=\"tracking-code\" class=\"col s12\">
        ";
        // line 72
        if ((isset($context["notificationMessage"]) || array_key_exists("notificationMessage", $context) ? $context["notificationMessage"] : (function () { throw new RuntimeError('Variable "notificationMessage" does not exist.', 72, $this->source); })())) {
            // line 73
            echo "            <p></p><p></p>
            <div class=\"system notification notification-info ";
            // line 74
            echo (((isset($context["isNotificationsMerged"]) || array_key_exists("isNotificationsMerged", $context) ? $context["isNotificationsMerged"] : (function () { throw new RuntimeError('Variable "isNotificationsMerged" does not exist.', 74, $this->source); })())) ? (" merged-notification") : (""));
            echo "\">
                ";
            // line 75
            echo (isset($context["notificationMessage"]) || array_key_exists("notificationMessage", $context) ? $context["notificationMessage"] : (function () { throw new RuntimeError('Variable "notificationMessage" does not exist.', 75, $this->source); })());
            echo "
            </div>
        ";
        }
        // line 78
        echo "
        <p>";
        // line 79
        echo $this->env->getFilter('translate')->getCallable()("CoreAdminHome_JSTracking_CodeNoteBeforeClosingHead", "&lt;/head&gt;");
        echo "</p>

        <div
                vue-entry=\"CoreAdminHome.JsTrackingCodeGeneratorSitesWithoutData\"
                default-site=\"";
        // line 83
        echo \Piwik\piwik_escape_filter($this->env, json_encode((isset($context["defaultSiteDecoded"]) || array_key_exists("defaultSiteDecoded", $context) ? $context["defaultSiteDecoded"] : (function () { throw new RuntimeError('Variable "defaultSiteDecoded" does not exist.', 83, $this->source); })())), "html", null, true);
        echo "\"
                max-custom-variables=\"";
        // line 84
        echo \Piwik\piwik_escape_filter($this->env, json_encode((isset($context["maxCustomVariables"]) || array_key_exists("maxCustomVariables", $context) ? $context["maxCustomVariables"] : (function () { throw new RuntimeError('Variable "maxCustomVariables" does not exist.', 84, $this->source); })())), "html", null, true);
        echo "\"
                server-side-do-not-track-enabled=\"";
        // line 85
        echo \Piwik\piwik_escape_filter($this->env, json_encode((isset($context["serverSideDoNotTrackEnabled"]) || array_key_exists("serverSideDoNotTrackEnabled", $context) ? $context["serverSideDoNotTrackEnabled"] : (function () { throw new RuntimeError('Variable "serverSideDoNotTrackEnabled" does not exist.', 85, $this->source); })())), "html", null, true);
        echo "\"
                js-tag=\"";
        // line 86
        echo (isset($context["jsTag"]) || array_key_exists("jsTag", $context) ? $context["jsTag"] : (function () { throw new RuntimeError('Variable "jsTag" does not exist.', 86, $this->source); })());
        echo "\"
        ></div>
    </div>

    <div id=\"mtm\" class=\"col s12\">
        ";
        // line 91
        if ((isset($context["tagManagerActive"]) || array_key_exists("tagManagerActive", $context) ? $context["tagManagerActive"] : (function () { throw new RuntimeError('Variable "tagManagerActive" does not exist.', 91, $this->source); })())) {
            // line 92
            echo "            ";
            echo $this->env->getFunction('postEvent')->getCallable()("Template.endTrackingCodePage");
            echo "
        ";
        } else {
            // line 94
            echo "                <h3>";
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataMatomoTagManager"), "html", null, true);
            echo "</h3>
                <p>";
            // line 95
            echo $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataMatomoTagManagerNotActive", "<a href=\"https://matomo.org/docs/tag-manager/\" rel=\"noreferrer noopener\" target=\"_blank\">", "</a>");
            echo "</p>
        ";
        }
        // line 97
        echo "    </div>

    ";
        // line 99
        if ((isset($context["gtmUsed"]) || array_key_exists("gtmUsed", $context) ? $context["gtmUsed"] : (function () { throw new RuntimeError('Variable "gtmUsed" does not exist.', 99, $this->source); })())) {
            // line 100
            echo "        <div id=\"google-tag-manager\" class=\"col s12\">

            <p></p><p></p>
            <div class=\"system notification notification-info\">
                ";
            // line 104
            echo $this->env->getFilter('translate')->getCallable()("SitesManager_GTMDetected", "<a href=\"https://matomo.org/faq/tag-manager/migrating-from-google-tag-manager/\" target=\"_blank\" rel=\"noreferrer noopener\">", "</a>");
            echo "
            </div>

            <div class=\"right\">
                <img src=\"plugins/SitesManager/images/google-tag-manager-icon.png\" style=\"margin-top: -3rem;\">
            </div>
            ";
            // line 110
            echo $this->env->getFunction('postEvent')->getCallable()("Template.noDataPageGTMTabInstructions");
            echo "

        </div>
    ";
        }
        // line 114
        echo "
    ";
        // line 115
        if (((isset($context["cms"]) || array_key_exists("cms", $context) ? $context["cms"] : (function () { throw new RuntimeError('Variable "cms" does not exist.', 115, $this->source); })()) == "wordpress")) {
            // line 116
            echo "        <div id=\"wordpress\" class=\"col s12\">

            <div class=\"right\">
                <img src=\"plugins/SitesManager/images/wordpress-icon.png\" style=\"margin-top: -3rem;\">
            </div>
            ";
            // line 121
            echo $this->env->getFunction('postEvent')->getCallable()("Template.noDataPageWordpressTabInstructions");
            echo "

        </div>
    ";
        }
        // line 125
        echo "
    ";
        // line 126
        if ((isset($context["cloudflare"]) || array_key_exists("cloudflare", $context) ? $context["cloudflare"] : (function () { throw new RuntimeError('Variable "cloudflare" does not exist.', 126, $this->source); })())) {
            // line 127
            echo "        <div id=\"cloudflare\" class=\"col s12\">

            <p></p><p></p>
            <div class=\"system notification notification-info\">
                ";
            // line 131
            echo $this->env->getFilter('translate')->getCallable()("SitesManager_CloudflareDetected", "<a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-my-cloudflare-setup/\">", "</a>");
            echo "
            </div>

            <div class=\"right\">
                <img src=\"plugins/SitesManager/images/cloudflare-icon.png\" style=\"height: 12rem;width: 12rem;margin-top: -4rem;\">
            </div>
            <p>";
            // line 137
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataCloudflareIntro"), "html", null, true);
            echo "</p>
            <br>
            <p>";
            // line 139
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataCloudflareFollowStepsIntro"), "html", null, true);
            echo "</p>
            <ol style=\"list-style: decimal;list-style-position: inside;\">
                <li>";
            // line 141
            echo $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataCloudflareFollowStep01", "<a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://dash.cloudflare.com/\">", "</a>");
            echo "</li>
                <li>";
            // line 142
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataCloudflareFollowStep02"), "html", null, true);
            echo "</li>
                <li>";
            // line 143
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataCloudflareFollowStep03"), "html", null, true);
            echo "</li>
                <li>";
            // line 144
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataCloudflareFollowStep04"), "html", null, true);
            echo "</li>
                <li>";
            // line 145
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataCloudflareFollowStep05"), "html", null, true);
            echo "</li>
                <li>";
            // line 146
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataCloudflareFollowStep06"), "html", null, true);
            echo "</li>
                <li>";
            // line 147
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataCloudflareFollowStep07"), "html", null, true);
            echo "<div style=\"text-indent: 1.2rem;\">Matomo URL: <code vue-directive=\"CoreHome.SelectOnFocus\">";
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["piwikUrl"]) || array_key_exists("piwikUrl", $context) ? $context["piwikUrl"] : (function () { throw new RuntimeError('Variable "piwikUrl" does not exist.', 147, $this->source); })()), "html", null, true);
            echo "</code></div><div style=\"text-indent: 1.2rem;\">";
            echo $this->env->getFilter('translate')->getCallable()("SitesManager_EmailInstructionsYourSiteId", (("<code vue-directive=\"CoreHome.CopyToClipboard\">" . (isset($context["idSite"]) || array_key_exists("idSite", $context) ? $context["idSite"] : (function () { throw new RuntimeError('Variable "idSite" does not exist.', 147, $this->source); })())) . "</code>"));
            echo "</div></li>
                <li>";
            // line 148
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataCloudflareFollowStep08"), "html", null, true);
            echo "</li>
                <li>";
            // line 149
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataCloudflareFollowStep09"), "html", null, true);
            echo "</li>
                <li>";
            // line 150
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataCloudflareFollowStep10"), "html", null, true);
            echo "</li>
            </ol>
            <br>
            <p>";
            // line 153
            echo $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataCloudflareFollowStepCompleted", "<strong>", "</strong>");
            echo "</p>
        </div>
    ";
        }
        // line 156
        echo "
    ";
        // line 157
        if (((isset($context["jsFramework"]) || array_key_exists("jsFramework", $context) ? $context["jsFramework"] : (function () { throw new RuntimeError('Variable "jsFramework" does not exist.', 157, $this->source); })()) == "vue")) {
            // line 158
            echo "        <div id=\"vue\" class=\"col s12\">

            <p></p><p></p>
            <div class=\"system notification notification-info\">
                ";
            // line 162
            echo $this->env->getFilter('translate')->getCallable()("SitesManager_VueDetected", "<a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://github.com/AmazingDreams/vue-matomo\">vue-matomo</a>", "<a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-websites-that-use-vue-js/\">", "</a>");
            echo "
            </div>

            <div class=\"right\">
                <img src=\"plugins/SitesManager/images/vue-icon.png\" style=\"height: 5rem;\">
            </div>
            ";
            // line 168
            $this->loadTemplate("@SitesManager/_vueTabInstructions.twig", "@SitesManager/_siteWithoutDataTabs.twig", 168)->display($context);
            // line 169
            echo "
        </div>
    ";
        }
        // line 172
        echo "
    ";
        // line 173
        if (((isset($context["jsFramework"]) || array_key_exists("jsFramework", $context) ? $context["jsFramework"] : (function () { throw new RuntimeError('Variable "jsFramework" does not exist.', 173, $this->source); })()) == "react")) {
            // line 174
            echo "        <div id=\"react\" class=\"col s12\">

            <p></p><p></p>
            <div class=\"system notification notification-info\">
                ";
            // line 178
            echo $this->env->getFilter('translate')->getCallable()("SitesManager_ReactDetected", "<a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/guide/tag-manager/\">", "</a>", "<a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/faq/new-to-piwik/how-do-i-start-tracking-data-with-matomo-on-websites-that-use-react/\">", "</a>");
            echo "
            </div>

            <div class=\"right\">
                <img src=\"plugins/SitesManager/images/react-icon.png\" style=\"height: 5rem;\">
            </div>
            ";
            // line 184
            echo $this->env->getFunction('postEvent')->getCallable()("Template.embedReactTagManagerTrackingCode");
            echo "

        </div>
    ";
        }
        // line 188
        echo "
    ";
        // line 189
        if ((isset($context["tagManagerActive"]) || array_key_exists("tagManagerActive", $context) ? $context["tagManagerActive"] : (function () { throw new RuntimeError('Variable "tagManagerActive" does not exist.', 189, $this->source); })())) {
            // line 190
            echo "        <div id=\"spa\" class=\"col s12\">
            ";
            // line 191
            $this->loadTemplate("@SitesManager/_spa.twig", "@SitesManager/_siteWithoutDataTabs.twig", 191)->display($context);
            // line 192
            echo "        </div>
    ";
        }
        // line 194
        echo "
    <div id=\"other\" class=\"col s12\">
        <h3 class=\"no-mt-top\">";
        // line 196
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_LogAnalytics"), "html", null, true);
        echo "</h3>
        <p>";
        // line 197
        echo $this->env->getFilter('translate')->getCallable()("SitesManager_LogAnalyticsDescription", "<a href=\"https://matomo.org/log-analytics/\" rel=\"noreferrer noopener\" target=\"_blank\">", "</a>");
        echo "</p>

        <h3>";
        // line 199
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_MobileAppsAndSDKs"), "html", null, true);
        echo "</h3>
        <p>";
        // line 200
        echo $this->env->getFilter('translate')->getCallable()("SitesManager_MobileAppsAndSDKsDescription", "<a href=\"https://matomo.org/integrate/#programming-language-platforms-and-frameworks\" rel=\"noreferrer noopener\" target=\"_blank\">", "</a>");
        echo "</p>

        <h3>";
        // line 202
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CoreAdminHome_HttpTrackingApi"), "html", null, true);
        echo "</h3>
        <p>";
        // line 203
        echo $this->env->getFilter('translate')->getCallable()("CoreAdminHome_HttpTrackingApiDescription", "<a href=\"https://developer.matomo.org/api-reference/tracking-api\" rel=\"noreferrer noopener\" target=\"_blank\">", "</a>");
        echo "</p>

        <h3>";
        // line 205
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataGoogleTagManager"), "html", null, true);
        echo "</h3>
        <p>";
        // line 206
        echo $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataGoogleTagManagerDescription", "<a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/faq/new-to-piwik/how-do-i-use-matomo-analytics-within-gtm-google-tag-manager\">", "</a>");
        echo "</p>

        <h3>WordPress</h3>
        <p>";
        // line 209
        echo $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataWordpressDescription", "<a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-wordpress/\">", "</a>");
        echo "</p>

        <h3>";
        // line 211
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataSinglePageApplication"), "html", null, true);
        echo "</h3>
        <p>";
        // line 212
        echo $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataSinglePageApplicationDescription", "<a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://developer.matomo.org/guides/spa-tracking\">", "</a>");
        echo "</p>

        <h3>Cloudflare</h3>
        <p>";
        // line 215
        echo $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataCloudflareDescription", "<a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-my-cloudflare-setup/\">", "</a>");
        echo "</p>

        <h3>Vue.js</h3>
        <p>";
        // line 218
        echo $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataVueDescription", "<a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://github.com/AmazingDreams/vue-matomo\">vue-matomo</a>", "<a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-websites-that-use-vue-js/\">", "</a>");
        echo "</p>

        <h3>React.js</h3>
        <p>";
        // line 221
        echo $this->env->getFilter('translate')->getCallable()("SitesManager_SiteWithoutDataReactDescription", "<a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/guide/tag-manager/\">", "</a>", "<a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/faq/new-to-piwik/how-do-i-start-tracking-data-with-matomo-on-websites-that-use-react/\">", "</a>");
        echo "</p>

        ";
        // line 223
        if (array_key_exists("googleAnalyticsImporterMessage", $context)) {
            // line 224
            echo "            ";
            echo (isset($context["googleAnalyticsImporterMessage"]) || array_key_exists("googleAnalyticsImporterMessage", $context) ? $context["googleAnalyticsImporterMessage"] : (function () { throw new RuntimeError('Variable "googleAnalyticsImporterMessage" does not exist.', 224, $this->source); })());
            echo "
        ";
        }
        // line 226
        echo "    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@SitesManager/_siteWithoutDataTabs.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  568 => 226,  562 => 224,  560 => 223,  555 => 221,  549 => 218,  543 => 215,  537 => 212,  533 => 211,  528 => 209,  522 => 206,  518 => 205,  513 => 203,  509 => 202,  504 => 200,  500 => 199,  495 => 197,  491 => 196,  487 => 194,  483 => 192,  481 => 191,  478 => 190,  476 => 189,  473 => 188,  466 => 184,  457 => 178,  451 => 174,  449 => 173,  446 => 172,  441 => 169,  439 => 168,  430 => 162,  424 => 158,  422 => 157,  419 => 156,  413 => 153,  407 => 150,  403 => 149,  399 => 148,  391 => 147,  387 => 146,  383 => 145,  379 => 144,  375 => 143,  371 => 142,  367 => 141,  362 => 139,  357 => 137,  348 => 131,  342 => 127,  340 => 126,  337 => 125,  330 => 121,  323 => 116,  321 => 115,  318 => 114,  311 => 110,  302 => 104,  296 => 100,  294 => 99,  290 => 97,  285 => 95,  280 => 94,  274 => 92,  272 => 91,  264 => 86,  260 => 85,  256 => 84,  252 => 83,  245 => 79,  242 => 78,  236 => 75,  232 => 74,  229 => 73,  227 => 72,  222 => 69,  217 => 67,  213 => 66,  209 => 65,  204 => 63,  200 => 62,  181 => 47,  174 => 45,  171 => 44,  165 => 42,  163 => 41,  157 => 39,  155 => 38,  144 => 33,  138 => 31,  135 => 30,  127 => 28,  124 => 27,  116 => 25,  113 => 24,  105 => 22,  102 => 21,  94 => 19,  91 => 18,  81 => 16,  79 => 15,  73 => 14,  63 => 13,  53 => 12,  47 => 8,  45 => 7,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<script type=\"text/javascript\">
    \$(document).ready(function(){
        \$('.tabs').tabs();
    });
</script>

{% set columnClass = activeTab ? 's2' : 's3' %}

<div class=\"row no-data-tabs-main-div\">
    <div class=\"col s12 tabs-row\">
        <ul class=\"tabs no-data-screen-ul-tabs\">
            <li class=\"tab col {{ columnClass }}\"><a {% if siteType != constant('Piwik\\\\Plugins\\\\SitesManager\\\\SitesManager::SITE_TYPE_UNKNOWN') and (consentManagerName == false) and (activeTab == '') %} class=\"active\" {% endif %} href=\"#integrations\">{{ 'SitesManager_Integrations'|translate }}</a></li>
            <li class=\"tab col {{ columnClass }}\"><a {% if (siteType == constant('Piwik\\\\Plugins\\\\SitesManager\\\\SitesManager::SITE_TYPE_UNKNOWN') and (activeTab == '')) or consentManagerName %} class=\"active\" {% endif %} href=\"#tracking-code\">{{ 'CoreAdminHome_TrackingCode'|translate }}</a></li>
            <li class=\"tab col {{ columnClass }}\"><a href=\"#mtm\">{{ 'SitesManager_SiteWithoutDataMatomoTagManager'|translate }}</a></li>
            {% if gtmUsed %}
                <li class=\"tab col s2\"><a {% if activeTab == 'gtm' %} class=\"active\" {% endif %} href=\"#google-tag-manager\">{{ 'SitesManager_SiteWithoutDataGoogleTagManager'|translate }}</a></li>
            {% endif %}
            {% if cms == 'wordpress' %}
                <li class=\"tab col s2\"><a {% if activeTab == 'wordpress' %} class=\"active\" {% endif %} href=\"#wordpress\">WordPress</a></li>
            {% endif %}
            {% if cloudflare %}
                <li class=\"tab col s2\"><a {% if activeTab == 'cloudflare' %} class=\"active\" {% endif %} href=\"#cloudflare\">Cloudflare</a></li>
            {% endif %}
            {% if jsFramework == 'vue' %}
                <li class=\"tab col s2\"><a {% if activeTab == 'vue' %} class=\"active\" {% endif %} href=\"#vue\">Vue.js</a></li>
            {% endif %}
            {% if jsFramework == 'react' %}
                <li class=\"tab col s2\"><a {% if activeTab == 'react' %} class=\"active\" {% endif %} href=\"#react\">React.js</a></li>
            {% endif %}
            {%  if tagManagerActive %}
                <li class=\"tab col {{ columnClass }}\"><a href=\"#spa\">SPA / PWA</a></li>
            {% endif %}
            <li class=\"tab col {{ columnClass }}\"><a href=\"#other\">{{ 'SitesManager_SiteWithoutDataOtherWays'|translate }}</a></li>
        </ul>
    </div>

    <div id=\"integrations\" class=\"col s12\">
        {% if instruction %}
            <p>{{ instruction|raw }}</p>

            {% if gtmUsed %}
                <p>{{ 'SitesManager_SiteWithoutDataDetectedGtm'|translate(siteType|capitalize, '<a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/faq/new-to-piwik/how-do-i-use-matomo-analytics-within-gtm-google-tag-manager\">','</a>')|raw }}</p>
            {% endif %}

            <p>{{ 'SitesManager_SiteWithoutDataOtherIntegrations'|translate }}: {{ 'CoreAdminHome_JSTrackingIntro3a'|translate('<a href=\"https://matomo.org/integrate/\" rel=\"noreferrer noopener\" target=\"_blank\">','</a>')|raw }}</p>
        {% else %}
            <p>{{ 'SitesManager_InstallationGuidesIntro'|translate }}

            <p>
                <a target=\"_blank\" rel=\"noreferrer noopener\" href='https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-wordpress/'>WordPress</a>
                | <a target=\"_blank\" rel=\"noreferrer noopener\" href='https://matomo.org/faq/new-to-piwik/how-do-i-integrate-matomo-with-squarespace-website/'>Squarespace</a>
                | <a target=\"_blank\" rel=\"noreferrer noopener\" href='https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-analytics-tracking-code-on-wix/'>Wix</a>
                | <a target=\"_blank\" rel=\"noreferrer noopener\" href='https://matomo.org/faq/how-to-install/faq_19424/'>SharePoint</a>
                | <a target=\"_blank\" rel=\"noreferrer noopener\" href='https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-analytics-tracking-code-on-joomla/'>Joomla</a>
                | <a target=\"_blank\" rel=\"noreferrer noopener\" href='https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-my-shopify-store/'>Shopify</a>
                | <a target=\"_blank\" rel=\"noreferrer noopener\" href='https://matomo.org/faq/new-to-piwik/how-do-i-use-matomo-analytics-within-gtm-google-tag-manager/'>Google Tag Manager</a>
                | <a target=\"_blank\" rel=\"noreferrer noopener\" href='https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-my-cloudflare-setup/'>Cloudflare</a>
                | <a target=\"_blank\" rel=\"noreferrer noopener\" href='https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-websites-that-use-vue-js/'>Vue</a>
                | <a target=\"_blank\" rel=\"noreferrer noopener\" href='https://matomo.org/faq/new-to-piwik/how-do-i-start-tracking-data-with-matomo-on-websites-that-use-react/'>React</a>
            </p>

            <p>{{ 'CoreAdminHome_JSTrackingIntro3a'|translate('<a href=\"https://matomo.org/integrate/\" rel=\"noreferrer noopener\" target=\"_blank\">','</a>')|raw }}</p>
            <p>{{ 'CoreAdminHome_JSTrackingIntro3b'|translate|raw }}</p>
            <br>
            <p>{{ 'SitesManager_ExtraInformationNeeded'|translate }}</p>
            <p>Matomo URL: <code piwik-select-on-focus>{{ piwikUrl }}</code></p>
            <p>{{ 'SitesManager_EmailInstructionsYourSiteId'|translate('<code piwik-select-on-focus>' ~ idSite ~ '</code>')|raw }}</p>
        {% endif %}
    </div>

    <div id=\"tracking-code\" class=\"col s12\">
        {% if notificationMessage %}
            <p></p><p></p>
            <div class=\"system notification notification-info {{ isNotificationsMerged ? ' merged-notification' : ''}}\">
                {{ notificationMessage|raw }}
            </div>
        {% endif %}

        <p>{{ 'CoreAdminHome_JSTracking_CodeNoteBeforeClosingHead'|translate(\"&lt;/head&gt;\")|raw }}</p>

        <div
                vue-entry=\"CoreAdminHome.JsTrackingCodeGeneratorSitesWithoutData\"
                default-site=\"{{ defaultSiteDecoded|json_encode }}\"
                max-custom-variables=\"{{ maxCustomVariables|json_encode }}\"
                server-side-do-not-track-enabled=\"{{ serverSideDoNotTrackEnabled|json_encode }}\"
                js-tag=\"{{ jsTag|raw }}\"
        ></div>
    </div>

    <div id=\"mtm\" class=\"col s12\">
        {% if tagManagerActive %}
            {{ postEvent('Template.endTrackingCodePage') }}
        {% else %}
                <h3>{{ 'SitesManager_SiteWithoutDataMatomoTagManager'|translate }}</h3>
                <p>{{ 'SitesManager_SiteWithoutDataMatomoTagManagerNotActive'|translate('<a href=\"https://matomo.org/docs/tag-manager/\" rel=\"noreferrer noopener\" target=\"_blank\">', '</a>')|raw }}</p>
        {% endif %}
    </div>

    {% if gtmUsed %}
        <div id=\"google-tag-manager\" class=\"col s12\">

            <p></p><p></p>
            <div class=\"system notification notification-info\">
                {{ 'SitesManager_GTMDetected'|translate('<a href=\"https://matomo.org/faq/tag-manager/migrating-from-google-tag-manager/\" target=\"_blank\" rel=\"noreferrer noopener\">', '</a>')|raw }}
            </div>

            <div class=\"right\">
                <img src=\"plugins/SitesManager/images/google-tag-manager-icon.png\" style=\"margin-top: -3rem;\">
            </div>
            {{ postEvent('Template.noDataPageGTMTabInstructions') }}

        </div>
    {% endif %}

    {% if cms == 'wordpress' %}
        <div id=\"wordpress\" class=\"col s12\">

            <div class=\"right\">
                <img src=\"plugins/SitesManager/images/wordpress-icon.png\" style=\"margin-top: -3rem;\">
            </div>
            {{ postEvent('Template.noDataPageWordpressTabInstructions') }}

        </div>
    {% endif %}

    {% if cloudflare %}
        <div id=\"cloudflare\" class=\"col s12\">

            <p></p><p></p>
            <div class=\"system notification notification-info\">
                {{ 'SitesManager_CloudflareDetected'|translate('<a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-my-cloudflare-setup/\">','</a>')|raw }}
            </div>

            <div class=\"right\">
                <img src=\"plugins/SitesManager/images/cloudflare-icon.png\" style=\"height: 12rem;width: 12rem;margin-top: -4rem;\">
            </div>
            <p>{{ 'SitesManager_SiteWithoutDataCloudflareIntro'|translate }}</p>
            <br>
            <p>{{ 'SitesManager_SiteWithoutDataCloudflareFollowStepsIntro'|translate }}</p>
            <ol style=\"list-style: decimal;list-style-position: inside;\">
                <li>{{ 'SitesManager_SiteWithoutDataCloudflareFollowStep01'|translate('<a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://dash.cloudflare.com/\">','</a>')|raw }}</li>
                <li>{{ 'SitesManager_SiteWithoutDataCloudflareFollowStep02'|translate }}</li>
                <li>{{ 'SitesManager_SiteWithoutDataCloudflareFollowStep03'|translate }}</li>
                <li>{{ 'SitesManager_SiteWithoutDataCloudflareFollowStep04'|translate }}</li>
                <li>{{ 'SitesManager_SiteWithoutDataCloudflareFollowStep05'|translate }}</li>
                <li>{{ 'SitesManager_SiteWithoutDataCloudflareFollowStep06'|translate }}</li>
                <li>{{ 'SitesManager_SiteWithoutDataCloudflareFollowStep07'|translate }}<div style=\"text-indent: 1.2rem;\">Matomo URL: <code vue-directive=\"CoreHome.SelectOnFocus\">{{ piwikUrl }}</code></div><div style=\"text-indent: 1.2rem;\">{{ 'SitesManager_EmailInstructionsYourSiteId'|translate('<code vue-directive=\"CoreHome.CopyToClipboard\">' ~ idSite ~ '</code>')|raw }}</div></li>
                <li>{{ 'SitesManager_SiteWithoutDataCloudflareFollowStep08'|translate }}</li>
                <li>{{ 'SitesManager_SiteWithoutDataCloudflareFollowStep09'|translate }}</li>
                <li>{{ 'SitesManager_SiteWithoutDataCloudflareFollowStep10'|translate }}</li>
            </ol>
            <br>
            <p>{{ 'SitesManager_SiteWithoutDataCloudflareFollowStepCompleted'|translate('<strong>','</strong>')|raw }}</p>
        </div>
    {% endif %}

    {% if jsFramework == 'vue' %}
        <div id=\"vue\" class=\"col s12\">

            <p></p><p></p>
            <div class=\"system notification notification-info\">
                {{ 'SitesManager_VueDetected'|translate('<a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://github.com/AmazingDreams/vue-matomo\">vue-matomo</a>','<a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-websites-that-use-vue-js/\">','</a>')|raw }}
            </div>

            <div class=\"right\">
                <img src=\"plugins/SitesManager/images/vue-icon.png\" style=\"height: 5rem;\">
            </div>
            {% include '@SitesManager/_vueTabInstructions.twig' %}

        </div>
    {% endif %}

    {% if jsFramework == 'react' %}
        <div id=\"react\" class=\"col s12\">

            <p></p><p></p>
            <div class=\"system notification notification-info\">
                {{ 'SitesManager_ReactDetected'|translate('<a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/guide/tag-manager/\">','</a>','<a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/faq/new-to-piwik/how-do-i-start-tracking-data-with-matomo-on-websites-that-use-react/\">','</a>')|raw }}
            </div>

            <div class=\"right\">
                <img src=\"plugins/SitesManager/images/react-icon.png\" style=\"height: 5rem;\">
            </div>
            {{ postEvent('Template.embedReactTagManagerTrackingCode') }}

        </div>
    {% endif %}

    {%  if tagManagerActive %}
        <div id=\"spa\" class=\"col s12\">
            {% include '@SitesManager/_spa.twig' %}
        </div>
    {% endif %}

    <div id=\"other\" class=\"col s12\">
        <h3 class=\"no-mt-top\">{{ 'SitesManager_LogAnalytics'|translate }}</h3>
        <p>{{ 'SitesManager_LogAnalyticsDescription'|translate('<a href=\"https://matomo.org/log-analytics/\" rel=\"noreferrer noopener\" target=\"_blank\">', '</a>')|raw }}</p>

        <h3>{{ 'SitesManager_MobileAppsAndSDKs'|translate }}</h3>
        <p>{{ 'SitesManager_MobileAppsAndSDKsDescription'|translate('<a href=\"https://matomo.org/integrate/#programming-language-platforms-and-frameworks\" rel=\"noreferrer noopener\" target=\"_blank\">','</a>')|raw }}</p>

        <h3>{{ 'CoreAdminHome_HttpTrackingApi'|translate }}</h3>
        <p>{{ 'CoreAdminHome_HttpTrackingApiDescription'|translate('<a href=\"https://developer.matomo.org/api-reference/tracking-api\" rel=\"noreferrer noopener\" target=\"_blank\">','</a>')|raw }}</p>

        <h3>{{ 'SitesManager_SiteWithoutDataGoogleTagManager'|translate }}</h3>
        <p>{{ 'SitesManager_SiteWithoutDataGoogleTagManagerDescription'|translate('<a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/faq/new-to-piwik/how-do-i-use-matomo-analytics-within-gtm-google-tag-manager\">','</a>')|raw }}</p>

        <h3>WordPress</h3>
        <p>{{ 'SitesManager_SiteWithoutDataWordpressDescription'|translate('<a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-wordpress/\">','</a>')|raw }}</p>

        <h3>{{ 'SitesManager_SiteWithoutDataSinglePageApplication'|translate }}</h3>
        <p>{{ 'SitesManager_SiteWithoutDataSinglePageApplicationDescription'|translate('<a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://developer.matomo.org/guides/spa-tracking\">','</a>')|raw }}</p>

        <h3>Cloudflare</h3>
        <p>{{ 'SitesManager_SiteWithoutDataCloudflareDescription'|translate('<a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-my-cloudflare-setup/\">','</a>')|raw }}</p>

        <h3>Vue.js</h3>
        <p>{{ 'SitesManager_SiteWithoutDataVueDescription'|translate('<a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://github.com/AmazingDreams/vue-matomo\">vue-matomo</a>', '<a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/faq/new-to-piwik/how-do-i-install-the-matomo-tracking-code-on-websites-that-use-vue-js/\">','</a>')|raw }}</p>

        <h3>React.js</h3>
        <p>{{ 'SitesManager_SiteWithoutDataReactDescription'|translate('<a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/guide/tag-manager/\">', '</a>', '<a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/faq/new-to-piwik/how-do-i-start-tracking-data-with-matomo-on-websites-that-use-react/\">','</a>')|raw }}</p>

        {% if googleAnalyticsImporterMessage is defined %}
            {{ googleAnalyticsImporterMessage|raw }}
        {% endif %}
    </div>
</div>
", "@SitesManager/_siteWithoutDataTabs.twig", "/home/u333978671/domains/ctosweb.com/public_html/Food_Order/public/matomo/plugins/SitesManager/templates/_siteWithoutDataTabs.twig");
    }
}
