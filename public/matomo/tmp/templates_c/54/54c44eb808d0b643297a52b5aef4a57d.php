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

/* @Annotations/_annotationList.twig */
class __TwigTemplate_7dd971bbaa1d21c5214245c1affa4829 extends Template
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
        echo "<div class=\"annotations\">

    ";
        // line 3
        if (twig_test_empty((isset($context["annotations"]) || array_key_exists("annotations", $context) ? $context["annotations"] : (function () { throw new RuntimeError('Variable "annotations" does not exist.', 3, $this->source); })()))) {
            // line 4
            echo "        <div class=\"empty-annotation-list\">";
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("Annotations_NoAnnotations"), "html", null, true);
            echo "</div>
    ";
        }
        // line 6
        echo "
    <table>


        ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["annotations"]) || array_key_exists("annotations", $context) ? $context["annotations"] : (function () { throw new RuntimeError('Variable "annotations" does not exist.', 10, $this->source); })()));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["annotation"]) {
            // line 11
            echo "            ";
            $this->loadTemplate("@Annotations/_annotation.twig", "@Annotations/_annotationList.twig", 11)->display($context);
            // line 12
            echo "        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['annotation'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "

        <tr class=\"new-annotation-row\" style=\"display:none;\" data-date=\"";
        // line 15
        echo \Piwik\piwik_escape_filter($this->env, (isset($context["selectedDate"]) || array_key_exists("selectedDate", $context) ? $context["selectedDate"] : (function () { throw new RuntimeError('Variable "selectedDate" does not exist.', 15, $this->source); })()), "html", null, true);
        echo "\">
            <td class=\"annotation-meta\">
                <div class=\"annotation-star\">&nbsp;</div>
                <div class=\"annotation-period-edit\">
                    <a href=\"#\" class=\"font\">";
        // line 19
        echo \Piwik\piwik_escape_filter($this->env, (isset($context["selectedDate"]) || array_key_exists("selectedDate", $context) ? $context["selectedDate"] : (function () { throw new RuntimeError('Variable "selectedDate" does not exist.', 19, $this->source); })()), "html", null, true);
        echo "</a>

                    <div class=\"datepicker\" style=\"display:none;\"/>
                </div>
            </td>
            <td class=\"annotation-user-cell\"><span class=\"annotation-user\">";
        // line 24
        echo \Piwik\piwik_escape_filter($this->env, (isset($context["userLogin"]) || array_key_exists("userLogin", $context) ? $context["userLogin"] : (function () { throw new RuntimeError('Variable "userLogin" does not exist.', 24, $this->source); })()), "html", null, true);
        echo "</span></td>
            <td class=\"annotation-value\">
                <div class=\"input-field\">
                    <input type=\"text\" value=\"\"
                           class=\"new-annotation-edit\"
                           placeholder=\"";
        // line 29
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("Annotations_EnterAnnotationText"), "html", null, true);
        echo "\"/>
                </div><br/>
                <input type=\"button\" class=\"btn new-annotation-save\" value=\"";
        // line 31
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("General_Save"), "html", null, true);
        echo "\"/>
                <input type=\"button\" class=\"btn new-annotation-cancel\" value=\"";
        // line 32
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("General_Cancel"), "html", null, true);
        echo "\"/>
            </td>
        </tr>
    </table>

</div>
";
    }

    public function getTemplateName()
    {
        return "@Annotations/_annotationList.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 32,  121 => 31,  116 => 29,  108 => 24,  100 => 19,  93 => 15,  89 => 13,  75 => 12,  72 => 11,  55 => 10,  49 => 6,  43 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"annotations\">

    {% if annotations is empty %}
        <div class=\"empty-annotation-list\">{{ 'Annotations_NoAnnotations'|translate }}</div>
    {% endif %}

    <table>


        {% for annotation in annotations %}
            {% include \"@Annotations/_annotation.twig\" %}
        {% endfor %}


        <tr class=\"new-annotation-row\" style=\"display:none;\" data-date=\"{{ selectedDate }}\">
            <td class=\"annotation-meta\">
                <div class=\"annotation-star\">&nbsp;</div>
                <div class=\"annotation-period-edit\">
                    <a href=\"#\" class=\"font\">{{ selectedDate }}</a>

                    <div class=\"datepicker\" style=\"display:none;\"/>
                </div>
            </td>
            <td class=\"annotation-user-cell\"><span class=\"annotation-user\">{{ userLogin }}</span></td>
            <td class=\"annotation-value\">
                <div class=\"input-field\">
                    <input type=\"text\" value=\"\"
                           class=\"new-annotation-edit\"
                           placeholder=\"{{ 'Annotations_EnterAnnotationText'|translate }}\"/>
                </div><br/>
                <input type=\"button\" class=\"btn new-annotation-save\" value=\"{{ 'General_Save'|translate }}\"/>
                <input type=\"button\" class=\"btn new-annotation-cancel\" value=\"{{ 'General_Cancel'|translate }}\"/>
            </td>
        </tr>
    </table>

</div>
", "@Annotations/_annotationList.twig", "/home/u333978671/domains/ctosweb.com/public_html/Food_Order/public/matomo/plugins/Annotations/templates/_annotationList.twig");
    }
}
