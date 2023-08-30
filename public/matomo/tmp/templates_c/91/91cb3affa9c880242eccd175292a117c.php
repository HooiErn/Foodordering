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

/* @CoreUpdater/runUpdaterAndExit_done.twig */
class __TwigTemplate_fe13301aa3f5f09336eb98843bbf3bd3 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "@CoreUpdater/layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 2
        ob_start();
        // line 3
        echo "    ";
        echo $this->env->getFilter('translate')->getCallable()("CoreUpdater_HelpMessageContent", "<a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/faq/\">", "</a>", "</li><li>");
        echo "
";
        $context["helpMessage"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 1
        $this->parent = $this->loadTemplate("@CoreUpdater/layout.twig", "@CoreUpdater/runUpdaterAndExit_done.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 6
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo "
";
        // line 8
        if ((isset($context["coreError"]) || array_key_exists("coreError", $context) ? $context["coreError"] : (function () { throw new RuntimeError('Variable "coreError" does not exist.', 8, $this->source); })())) {
            // line 9
            echo "    <div class=\"header\">
        <h1>";
            // line 10
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CoreUpdater_UpdateErrorTitle"), "html", null, true);
            echo "</h1>
    </div>
    <div class=\"content\">
        <div class=\"alert alert-danger\">
            ";
            // line 14
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CoreUpdater_CriticalErrorDuringTheUpgradeProcess"), "html", null, true);
            echo "
            ";
            // line 15
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["errorMessages"]) || array_key_exists("errorMessages", $context) ? $context["errorMessages"] : (function () { throw new RuntimeError('Variable "errorMessages" does not exist.', 15, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 16
                echo "                <br/><strong>";
                echo \Piwik\piwik_escape_filter($this->env, twig_striptags($context["message"]), "html", null, true);
                echo "</strong>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 18
            echo "        </div>
        <p>";
            // line 19
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CoreUpdater_HelpMessageIntroductionWhenError"), "html", null, true);
            echo "</p>
        <ul>
            <li>";
            // line 21
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["helpMessage"]) || array_key_exists("helpMessage", $context) ? $context["helpMessage"] : (function () { throw new RuntimeError('Variable "helpMessage" does not exist.', 21, $this->source); })()), "html", null, true);
            echo "</li>
        </ul>
        <p>";
            // line 23
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CoreUpdater_ErrorDIYHelp"), "html", null, true);
            echo "</p>
        <ul>
            <li>";
            // line 25
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CoreUpdater_ErrorDIYHelp_1"), "html", null, true);
            echo "</li>
            <li>";
            // line 26
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CoreUpdater_ErrorDIYHelp_2"), "html", null, true);
            echo "</li>
            <li>";
            // line 27
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CoreUpdater_ErrorDIYHelp_3"), "html", null, true);
            echo " <a href='https://matomo.org/faq/how-to-update/faq_179' rel='noreferrer noopener' target='_blank'>(see FAQ)</a></li>
            <li>";
            // line 28
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CoreUpdater_ErrorDIYHelp_4"), "html", null, true);
            echo "</li>
            <li>";
            // line 29
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CoreUpdater_ErrorDIYHelp_5"), "html", null, true);
            echo "</li>
        </ul>
    </div>
";
        } else {
            // line 33
            echo "
    ";
            // line 34
            if (((twig_length_filter($this->env, (isset($context["errorMessages"]) || array_key_exists("errorMessages", $context) ? $context["errorMessages"] : (function () { throw new RuntimeError('Variable "errorMessages" does not exist.', 34, $this->source); })())) == 0) && (twig_length_filter($this->env, (isset($context["warningMessages"]) || array_key_exists("warningMessages", $context) ? $context["warningMessages"] : (function () { throw new RuntimeError('Variable "warningMessages" does not exist.', 34, $this->source); })())) == 0))) {
                // line 35
                echo "        <div class=\"header\">
            <h1>";
                // line 36
                echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CoreUpdater_PiwikHasBeenSuccessfullyUpgraded"), "html", null, true);
                echo "</h1>
        </div>
    ";
            }
            // line 39
            echo "
    <div class=\"content\">

        ";
            // line 42
            if ((twig_length_filter($this->env, (isset($context["warningMessages"]) || array_key_exists("warningMessages", $context) ? $context["warningMessages"] : (function () { throw new RuntimeError('Variable "warningMessages" does not exist.', 42, $this->source); })())) > 0)) {
                // line 43
                echo "            <div class=\"alert alert-warning\">
                <p>";
                // line 44
                echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CoreUpdater_WarningMessages"), "html", null, true);
                echo "</p>
                ";
                // line 45
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["warningMessages"]) || array_key_exists("warningMessages", $context) ? $context["warningMessages"] : (function () { throw new RuntimeError('Variable "warningMessages" does not exist.', 45, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                    // line 46
                    echo "                    <br/><strong>";
                    echo \Piwik\piwik_escape_filter($this->env, twig_striptags($context["message"]), "html", null, true);
                    echo "</strong>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 48
                echo "            </div>
        ";
            }
            // line 50
            echo "
        ";
            // line 51
            if ((twig_length_filter($this->env, (isset($context["errorMessages"]) || array_key_exists("errorMessages", $context) ? $context["errorMessages"] : (function () { throw new RuntimeError('Variable "errorMessages" does not exist.', 51, $this->source); })())) > 0)) {
                // line 52
                echo "            <div class=\"alert alert-warning\">
                <p>";
                // line 53
                echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CoreUpdater_ErrorDuringPluginsUpdates"), "html", null, true);
                echo "</p>
                ";
                // line 54
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["errorMessages"]) || array_key_exists("errorMessages", $context) ? $context["errorMessages"] : (function () { throw new RuntimeError('Variable "errorMessages" does not exist.', 54, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                    // line 55
                    echo "                    <br/><strong>";
                    echo \Piwik\piwik_escape_filter($this->env, twig_striptags($context["message"]), "html", null, true);
                    echo "</strong>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 57
                echo "            </div>
            ";
                // line 58
                if ((array_key_exists("deactivatedPlugins", $context) && (twig_length_filter($this->env, (isset($context["deactivatedPlugins"]) || array_key_exists("deactivatedPlugins", $context) ? $context["deactivatedPlugins"] : (function () { throw new RuntimeError('Variable "deactivatedPlugins" does not exist.', 58, $this->source); })())) > 0))) {
                    // line 59
                    echo "                ";
                    $context["listOfDeactivatedPlugins"] = twig_join_filter((isset($context["deactivatedPlugins"]) || array_key_exists("deactivatedPlugins", $context) ? $context["deactivatedPlugins"] : (function () { throw new RuntimeError('Variable "deactivatedPlugins" does not exist.', 59, $this->source); })()), ", ");
                    // line 60
                    echo "                <div class=\"alert alert-danger\">
                    ";
                    // line 61
                    echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CoreUpdater_WeAutomaticallyDeactivatedTheFollowingPlugins", (isset($context["listOfDeactivatedPlugins"]) || array_key_exists("listOfDeactivatedPlugins", $context) ? $context["listOfDeactivatedPlugins"] : (function () { throw new RuntimeError('Variable "listOfDeactivatedPlugins" does not exist.', 61, $this->source); })())), "html", null, true);
                    echo "
                </div>
            ";
                }
                // line 64
                echo "        ";
            }
            // line 65
            echo "
        ";
            // line 66
            if (((twig_length_filter($this->env, (isset($context["errorMessages"]) || array_key_exists("errorMessages", $context) ? $context["errorMessages"] : (function () { throw new RuntimeError('Variable "errorMessages" does not exist.', 66, $this->source); })())) > 0) || (twig_length_filter($this->env, (isset($context["warningMessages"]) || array_key_exists("warningMessages", $context) ? $context["warningMessages"] : (function () { throw new RuntimeError('Variable "warningMessages" does not exist.', 66, $this->source); })())) > 0))) {
                // line 67
                echo "            <p>";
                echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CoreUpdater_HelpMessageIntroductionWhenWarning"), "html", null, true);
                echo "</p>
            <ul>
                <li>";
                // line 69
                echo \Piwik\piwik_escape_filter($this->env, (isset($context["helpMessage"]) || array_key_exists("helpMessage", $context) ? $context["helpMessage"] : (function () { throw new RuntimeError('Variable "helpMessage" does not exist.', 69, $this->source); })()), "html", null, true);
                echo "</li>
            </ul>
        ";
            } else {
                // line 72
                echo "            <div id=\"donate-form-container\">
                ";
                // line 73
                $this->loadTemplate("@CoreHome/_donate.twig", "@CoreUpdater/runUpdaterAndExit_done.twig", 73)->display($context);
                // line 74
                echo "            </div>
        ";
            }
            // line 76
            echo "
    </div>

    <div class=\"footer\">
        <a href=\"index.php\">";
            // line 80
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("General_ContinueToPiwik"), "html", null, true);
            echo "</a>
    </div>

";
        }
        // line 84
        echo "
";
    }

    public function getTemplateName()
    {
        return "@CoreUpdater/runUpdaterAndExit_done.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  261 => 84,  254 => 80,  248 => 76,  244 => 74,  242 => 73,  239 => 72,  233 => 69,  227 => 67,  225 => 66,  222 => 65,  219 => 64,  213 => 61,  210 => 60,  207 => 59,  205 => 58,  202 => 57,  193 => 55,  189 => 54,  185 => 53,  182 => 52,  180 => 51,  177 => 50,  173 => 48,  164 => 46,  160 => 45,  156 => 44,  153 => 43,  151 => 42,  146 => 39,  140 => 36,  137 => 35,  135 => 34,  132 => 33,  125 => 29,  121 => 28,  117 => 27,  113 => 26,  109 => 25,  104 => 23,  99 => 21,  94 => 19,  91 => 18,  82 => 16,  78 => 15,  74 => 14,  67 => 10,  64 => 9,  62 => 8,  59 => 7,  55 => 6,  50 => 1,  44 => 3,  42 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends '@CoreUpdater/layout.twig' %}
{% set helpMessage %}
    {{ 'CoreUpdater_HelpMessageContent'|translate('<a target=\"_blank\" rel=\"noreferrer noopener\" href=\"https://matomo.org/faq/\">','</a>','</li><li>')|raw }}
{% endset %}

{% block content %}

{% if coreError %}
    <div class=\"header\">
        <h1>{{ 'CoreUpdater_UpdateErrorTitle'|translate }}</h1>
    </div>
    <div class=\"content\">
        <div class=\"alert alert-danger\">
            {{ 'CoreUpdater_CriticalErrorDuringTheUpgradeProcess'|translate }}
            {% for message in errorMessages %}
                <br/><strong>{{ message|striptags }}</strong>
            {% endfor %}
        </div>
        <p>{{ 'CoreUpdater_HelpMessageIntroductionWhenError'|translate }}</p>
        <ul>
            <li>{{ helpMessage }}</li>
        </ul>
        <p>{{ 'CoreUpdater_ErrorDIYHelp'|translate }}</p>
        <ul>
            <li>{{ 'CoreUpdater_ErrorDIYHelp_1'|translate }}</li>
            <li>{{ 'CoreUpdater_ErrorDIYHelp_2'|translate }}</li>
            <li>{{ 'CoreUpdater_ErrorDIYHelp_3'|translate }} <a href='https://matomo.org/faq/how-to-update/faq_179' rel='noreferrer noopener' target='_blank'>(see FAQ)</a></li>
            <li>{{ 'CoreUpdater_ErrorDIYHelp_4'|translate }}</li>
            <li>{{ 'CoreUpdater_ErrorDIYHelp_5'|translate }}</li>
        </ul>
    </div>
{% else %}

    {% if errorMessages|length == 0 and warningMessages|length == 0 %}
        <div class=\"header\">
            <h1>{{ 'CoreUpdater_PiwikHasBeenSuccessfullyUpgraded'|translate }}</h1>
        </div>
    {% endif %}

    <div class=\"content\">

        {% if warningMessages|length > 0 %}
            <div class=\"alert alert-warning\">
                <p>{{ 'CoreUpdater_WarningMessages'|translate }}</p>
                {% for message in warningMessages %}
                    <br/><strong>{{ message|striptags }}</strong>
                {% endfor %}
            </div>
        {% endif %}

        {% if errorMessages|length > 0 %}
            <div class=\"alert alert-warning\">
                <p>{{ 'CoreUpdater_ErrorDuringPluginsUpdates'|translate }}</p>
                {% for message in errorMessages %}
                    <br/><strong>{{ message|striptags }}</strong>
                {% endfor %}
            </div>
            {% if deactivatedPlugins is defined and deactivatedPlugins|length > 0 %}
                {% set listOfDeactivatedPlugins=deactivatedPlugins|join(', ') %}
                <div class=\"alert alert-danger\">
                    {{ 'CoreUpdater_WeAutomaticallyDeactivatedTheFollowingPlugins'|translate(listOfDeactivatedPlugins) }}
                </div>
            {% endif %}
        {% endif %}

        {% if errorMessages|length > 0 or warningMessages|length > 0 %}
            <p>{{ 'CoreUpdater_HelpMessageIntroductionWhenWarning'|translate }}</p>
            <ul>
                <li>{{ helpMessage }}</li>
            </ul>
        {% else %}
            <div id=\"donate-form-container\">
                {% include \"@CoreHome/_donate.twig\" %}
            </div>
        {% endif %}

    </div>

    <div class=\"footer\">
        <a href=\"index.php\">{{ 'General_ContinueToPiwik'|translate }}</a>
    </div>

{% endif %}

{% endblock %}
", "@CoreUpdater/runUpdaterAndExit_done.twig", "/home/u333978671/domains/ctosweb.com/public_html/Food_Order/public/matomo/plugins/CoreUpdater/templates/runUpdaterAndExit_done.twig");
    }
}
