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

/* @UsersManager/index.twig */
class __TwigTemplate_48e98fb7c3429276dde87c8c8019fdd4 extends Template
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
        return "admin.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        ob_start();
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("UsersManager_ManageAccess"), "html", null, true);
        $context["title"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 1
        $this->parent = $this->loadTemplate("admin.twig", "@UsersManager/index.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "<piwik-users-manager
    initial-site-id=\"";
        // line 7
        echo \Piwik\piwik_escape_filter($this->env, (isset($context["idSiteSelected"]) || array_key_exists("idSiteSelected", $context) ? $context["idSiteSelected"] : (function () { throw new RuntimeError('Variable "idSiteSelected" does not exist.', 7, $this->source); })()), "html", null, true);
        echo "\"
    invite-token-expiry-days=\"";
        // line 8
        echo \Piwik\piwik_escape_filter($this->env, (isset($context["inviteTokenExpiryDays"]) || array_key_exists("inviteTokenExpiryDays", $context) ? $context["inviteTokenExpiryDays"] : (function () { throw new RuntimeError('Variable "inviteTokenExpiryDays" does not exist.', 8, $this->source); })()), "html", null, true);
        echo "\"
    initial-site-name=\"";
        // line 9
        echo $this->env->getFilter('rawSafeDecoded')->getCallable()((isset($context["defaultReportSiteName"]) || array_key_exists("defaultReportSiteName", $context) ? $context["defaultReportSiteName"] : (function () { throw new RuntimeError('Variable "defaultReportSiteName" does not exist.', 9, $this->source); })()));
        echo "\"
    current-user-role=\"'";
        // line 10
        echo \Piwik\piwik_escape_filter($this->env, (isset($context["currentUserRole"]) || array_key_exists("currentUserRole", $context) ? $context["currentUserRole"] : (function () { throw new RuntimeError('Variable "currentUserRole" does not exist.', 10, $this->source); })()), "html", null, true);
        echo "'\"
    access-levels=\"";
        // line 11
        echo \Piwik\piwik_escape_filter($this->env, json_encode((isset($context["accessLevels"]) || array_key_exists("accessLevels", $context) ? $context["accessLevels"] : (function () { throw new RuntimeError('Variable "accessLevels" does not exist.', 11, $this->source); })())), "html_attr");
        echo "\"
    filter-access-levels=\"";
        // line 12
        echo \Piwik\piwik_escape_filter($this->env, json_encode((isset($context["filterAccessLevels"]) || array_key_exists("filterAccessLevels", $context) ? $context["filterAccessLevels"] : (function () { throw new RuntimeError('Variable "filterAccessLevels" does not exist.', 12, $this->source); })())), "html_attr");
        echo "\"
    filter-status-levels=\"";
        // line 13
        echo \Piwik\piwik_escape_filter($this->env, json_encode((isset($context["statusAccessLevels"]) || array_key_exists("statusAccessLevels", $context) ? $context["statusAccessLevels"] : (function () { throw new RuntimeError('Variable "statusAccessLevels" does not exist.', 13, $this->source); })())), "html_attr");
        echo "\"
>
</piwik-users-manager>

";
    }

    public function getTemplateName()
    {
        return "@UsersManager/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 13,  78 => 12,  74 => 11,  70 => 10,  66 => 9,  62 => 8,  58 => 7,  55 => 6,  51 => 5,  46 => 1,  42 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'admin.twig' %}

{% set title %}{{ 'UsersManager_ManageAccess'|translate }}{% endset %}

{% block content %}
<piwik-users-manager
    initial-site-id=\"{{ idSiteSelected }}\"
    invite-token-expiry-days=\"{{ inviteTokenExpiryDays }}\"
    initial-site-name=\"{{ defaultReportSiteName|rawSafeDecoded }}\"
    current-user-role=\"'{{ currentUserRole }}'\"
    access-levels=\"{{ accessLevels|json_encode|e('html_attr') }}\"
    filter-access-levels=\"{{ filterAccessLevels|json_encode|e('html_attr') }}\"
    filter-status-levels=\"{{ statusAccessLevels|json_encode|e('html_attr') }}\"
>
</piwik-users-manager>

{% endblock %}
", "@UsersManager/index.twig", "/home/u333978671/domains/ctosweb.com/public_html/Food_Order/public/matomo/plugins/UsersManager/templates/index.twig");
    }
}
