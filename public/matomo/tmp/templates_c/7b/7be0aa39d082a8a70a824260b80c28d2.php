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

/* @Annotations/getAnnotationManager.twig */
class __TwigTemplate_4019dd574560ced46aa3fa437d7c2c3c extends Template
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
        echo "<div class=\"annotation-manager\"
     ";
        // line 2
        if (((isset($context["startDate"]) || array_key_exists("startDate", $context) ? $context["startDate"] : (function () { throw new RuntimeError('Variable "startDate" does not exist.', 2, $this->source); })()) != (isset($context["endDate"]) || array_key_exists("endDate", $context) ? $context["endDate"] : (function () { throw new RuntimeError('Variable "endDate" does not exist.', 2, $this->source); })()))) {
            echo "data-date=\"";
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["startDate"]) || array_key_exists("startDate", $context) ? $context["startDate"] : (function () { throw new RuntimeError('Variable "startDate" does not exist.', 2, $this->source); })()), "html", null, true);
            echo ",";
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["endDate"]) || array_key_exists("endDate", $context) ? $context["endDate"] : (function () { throw new RuntimeError('Variable "endDate" does not exist.', 2, $this->source); })()), "html", null, true);
            echo "\" data-period=\"range\"
     ";
        } else {
            // line 3
            echo "data-date=\"";
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["startDate"]) || array_key_exists("startDate", $context) ? $context["startDate"] : (function () { throw new RuntimeError('Variable "startDate" does not exist.', 3, $this->source); })()), "html", null, true);
            echo "\" data-period=\"";
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["period"]) || array_key_exists("period", $context) ? $context["period"] : (function () { throw new RuntimeError('Variable "period" does not exist.', 3, $this->source); })()), "html", null, true);
            echo "\"
     ";
        }
        // line 4
        echo ">

    <div class=\"annotations-header\">
        <span class= \"annotation\">";
        // line 7
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("Annotations_Annotations"), "html", null, true);
        echo "</span>
    </div>

    <div class=\"annotation-list-range\">";
        // line 10
        echo \Piwik\piwik_escape_filter($this->env, (isset($context["startDatePretty"]) || array_key_exists("startDatePretty", $context) ? $context["startDatePretty"] : (function () { throw new RuntimeError('Variable "startDatePretty" does not exist.', 10, $this->source); })()), "html", null, true);
        if (((isset($context["startDate"]) || array_key_exists("startDate", $context) ? $context["startDate"] : (function () { throw new RuntimeError('Variable "startDate" does not exist.', 10, $this->source); })()) != (isset($context["endDate"]) || array_key_exists("endDate", $context) ? $context["endDate"] : (function () { throw new RuntimeError('Variable "endDate" does not exist.', 10, $this->source); })()))) {
            echo " &mdash; ";
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["endDatePretty"]) || array_key_exists("endDatePretty", $context) ? $context["endDatePretty"] : (function () { throw new RuntimeError('Variable "endDatePretty" does not exist.', 10, $this->source); })()), "html", null, true);
        }
        echo "</div>

    <div class=\"annotation-list\">
        ";
        // line 13
        $this->loadTemplate("@Annotations/_annotationList.twig", "@Annotations/getAnnotationManager.twig", 13)->display($context);
        // line 14
        echo "
        <span class=\"loadingPiwik\" style=\"display:none;\"><img src=\"plugins/Morpheus/images/loading-blue.gif\"/>";
        // line 15
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("General_Loading"), "html", null, true);
        echo "</span>

    </div>

    <div class=\"annotation-controls\">

        ";
        // line 21
        if ((isset($context["canUserAddNotes"]) || array_key_exists("canUserAddNotes", $context) ? $context["canUserAddNotes"] : (function () { throw new RuntimeError('Variable "canUserAddNotes" does not exist.', 21, $this->source); })())) {
            // line 22
            echo "        <a class=\"add-annotation\">
          <span class=\"icon-add\"></span>
          ";
            // line 24
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("Annotations_CreateNewAnnotation"), "html", null, true);
            echo "
        </a>
        ";
        } elseif ((        // line 26
(isset($context["userLogin"]) || array_key_exists("userLogin", $context) ? $context["userLogin"] : (function () { throw new RuntimeError('Variable "userLogin" does not exist.', 26, $this->source); })()) == "anonymous")) {
            // line 27
            echo "            <a href=\"index.php?module=Login\">";
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("Annotations_LoginToAnnotate"), "html", null, true);
            echo "</a>
        ";
        }
        // line 29
        echo "
    </div>

</div>
";
    }

    public function getTemplateName()
    {
        return "@Annotations/getAnnotationManager.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 29,  105 => 27,  103 => 26,  98 => 24,  94 => 22,  92 => 21,  83 => 15,  80 => 14,  78 => 13,  68 => 10,  62 => 7,  57 => 4,  49 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"annotation-manager\"
     {% if startDate != endDate %}data-date=\"{{ startDate }},{{ endDate }}\" data-period=\"range\"
     {% else %}data-date=\"{{ startDate }}\" data-period=\"{{ period }}\"
     {% endif %}>

    <div class=\"annotations-header\">
        <span class= \"annotation\">{{ 'Annotations_Annotations'|translate }}</span>
    </div>

    <div class=\"annotation-list-range\">{{ startDatePretty }}{% if startDate != endDate %} &mdash; {{ endDatePretty }}{% endif %}</div>

    <div class=\"annotation-list\">
        {% include \"@Annotations/_annotationList.twig\" %}

        <span class=\"loadingPiwik\" style=\"display:none;\"><img src=\"plugins/Morpheus/images/loading-blue.gif\"/>{{ 'General_Loading'|translate }}</span>

    </div>

    <div class=\"annotation-controls\">

        {% if canUserAddNotes %}
        <a class=\"add-annotation\">
          <span class=\"icon-add\"></span>
          {{ 'Annotations_CreateNewAnnotation'|translate }}
        </a>
        {% elseif userLogin == 'anonymous' %}
            <a href=\"index.php?module=Login\">{{ 'Annotations_LoginToAnnotate'|translate }}</a>
        {% endif %}

    </div>

</div>
", "@Annotations/getAnnotationManager.twig", "/home/u333978671/domains/ctosweb.com/public_html/Food_Order/public/matomo/plugins/Annotations/templates/getAnnotationManager.twig");
    }
}
