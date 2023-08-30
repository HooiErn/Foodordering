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

/* @UsersManager/userSecurity.twig */
class __TwigTemplate_f383ca773b91f105d0c0f23dd02f1063 extends Template
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
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("General_Security"), "html", null, true);
        $context["title"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 1
        $this->parent = $this->loadTemplate("admin.twig", "@UsersManager/userSecurity.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        if ((isset($context["isUsersAdminEnabled"]) || array_key_exists("isUsersAdminEnabled", $context) ? $context["isUsersAdminEnabled"] : (function () { throw new RuntimeError('Variable "isUsersAdminEnabled" does not exist.', 6, $this->source); })())) {
            // line 7
            echo "    <div piwik-content-block content-title=\"";
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("General_ChangePassword"), "html_attr");
            echo "\" feature=\"true\">
        <form id=\"userSettingsTable\" method=\"post\" action=\"";
            // line 8
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFunction('linkTo')->getCallable()(["module" => "UsersManager", "action" => "recordPasswordChange"]), "html", null, true);
            echo "\">

            <input type=\"hidden\" value=\"";
            // line 10
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["changePasswordNonce"]) || array_key_exists("changePasswordNonce", $context) ? $context["changePasswordNonce"] : (function () { throw new RuntimeError('Variable "changePasswordNonce" does not exist.', 10, $this->source); })()), "html_attr");
            echo "\" name=\"nonce\">

            ";
            // line 12
            if ((array_key_exists("isValidHost", $context) && (isset($context["isValidHost"]) || array_key_exists("isValidHost", $context) ? $context["isValidHost"] : (function () { throw new RuntimeError('Variable "isValidHost" does not exist.', 12, $this->source); })()))) {
                // line 13
                echo "
                <div piwik-field uicontrol=\"password\" name=\"password\" autocomplete=\"off\"
                     ng-model=\"personalSettings.password\"
                     ng-change=\"personalSettings.requirePasswordConfirmation()\"
                     data-title=\"";
                // line 17
                echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("Login_NewPassword"), "html_attr");
                echo "\"
                     value=\"\" inline-help=\"";
                // line 18
                echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("UsersManager_IfYouWouldLikeToChangeThePasswordTypeANewOne"), "html_attr");
                echo "\">
                </div>

                <div piwik-field uicontrol=\"password\" name=\"passwordBis\" autocomplete=\"off\"
                     ng-model=\"personalSettings.passwordBis\"
                     ng-change=\"personalSettings.requirePasswordConfirmation()\"
                     data-title=\"";
                // line 24
                echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("Login_NewPasswordRepeat"), "html_attr");
                echo "\"
                     value=\"\" inline-help=\"";
                // line 25
                echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("UsersManager_TypeYourPasswordAgain"), "html_attr");
                echo "\">
                </div>

                <div piwik-field uicontrol=\"password\" name=\"passwordConfirmation\" autocomplete=\"off\"
                     ng-model=\"personalSettings.current_password\"
                     data-title=\"";
                // line 30
                echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("UsersManager_YourCurrentPassword"), "html_attr");
                echo "\"
                     value=\"\" inline-help=\"";
                // line 31
                echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("UsersManager_TypeYourCurrentPassword"), "html_attr");
                echo "\">
                </div>

                <div class=\"alert alert-info\">
                    ";
                // line 35
                echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("UsersManager_PasswordChangeTerminatesOtherSessions"), "html", null, true);
                echo "
                </div>

                <input type=\"submit\"
                       value=\"";
                // line 39
                echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("General_Save"), "html_attr");
                echo "\"
                       class=\"btn\"/>
            ";
            }
            // line 42
            echo "
            ";
            // line 43
            if (( !array_key_exists("isValidHost", $context) ||  !(isset($context["isValidHost"]) || array_key_exists("isValidHost", $context) ? $context["isValidHost"] : (function () { throw new RuntimeError('Variable "isValidHost" does not exist.', 43, $this->source); })()))) {
                // line 44
                echo "                <div class=\"alert alert-danger\">
                    ";
                // line 45
                echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("UsersManager_InjectedHostCannotChangePwd", (isset($context["invalidHost"]) || array_key_exists("invalidHost", $context) ? $context["invalidHost"] : (function () { throw new RuntimeError('Variable "invalidHost" does not exist.', 45, $this->source); })())), "html", null, true);
                echo "
                    ";
                // line 46
                if ( !(isset($context["isSuperUser"]) || array_key_exists("isSuperUser", $context) ? $context["isSuperUser"] : (function () { throw new RuntimeError('Variable "isSuperUser" does not exist.', 46, $this->source); })())) {
                    echo $this->env->getFilter('translate')->getCallable()("UsersManager_EmailYourAdministrator", (isset($context["invalidHostMailLinkStart"]) || array_key_exists("invalidHostMailLinkStart", $context) ? $context["invalidHostMailLinkStart"] : (function () { throw new RuntimeError('Variable "invalidHostMailLinkStart" does not exist.', 46, $this->source); })()), "</a>");
                }
                // line 47
                echo "                </div>
            ";
            }
            // line 49
            echo "
        </form>
    </div>

    ";
            // line 53
            echo $this->env->getFunction('postEvent')->getCallable()("Template.userSecurity.afterPassword");
            echo "
";
        }
        // line 55
        echo "
    <a name=\"authtokens\" id=\"authtokens\"></a>
    <div piwik-content-block content-title=\"";
        // line 57
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("UsersManager_AuthTokens"), "html_attr");
        echo "\">
        <p>
            ";
        // line 59
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("UsersManager_TokenAuthIntro"), "html", null, true);
        echo "
            ";
        // line 60
        if ((isset($context["hasTokensWithExpireDate"]) || array_key_exists("hasTokensWithExpireDate", $context) ? $context["hasTokensWithExpireDate"] : (function () { throw new RuntimeError('Variable "hasTokensWithExpireDate" does not exist.', 60, $this->source); })())) {
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("UsersManager_ExpiredTokensDeleteAutomatically"), "html", null, true);
        }
        // line 61
        echo "        </p>
        <table piwik-content-table class=\"listAuthTokens\">
            <thead>
            <tr>
                <th>";
        // line 65
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("General_CreationDate"), "html", null, true);
        echo "</th>
                <th>";
        // line 66
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("General_Description"), "html", null, true);
        echo "</th>
                <th>";
        // line 67
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("UsersManager_LastUsed"), "html", null, true);
        echo "</th>
                ";
        // line 68
        if ((isset($context["hasTokensWithExpireDate"]) || array_key_exists("hasTokensWithExpireDate", $context) ? $context["hasTokensWithExpireDate"] : (function () { throw new RuntimeError('Variable "hasTokensWithExpireDate" does not exist.', 68, $this->source); })())) {
            echo "<th title=\"";
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("UsersManager_TokensWithExpireDateCreationBySystem"), "html_attr");
            echo "\">";
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("UsersManager_ExpireDate"), "html", null, true);
            echo "</th>";
        }
        // line 69
        echo "                <th>";
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("General_Actions"), "html", null, true);
        echo "</th>
            </tr>
            </thead>
            <tbody>
            ";
        // line 73
        if (twig_test_empty((isset($context["tokens"]) || array_key_exists("tokens", $context) ? $context["tokens"] : (function () { throw new RuntimeError('Variable "tokens" does not exist.', 73, $this->source); })()))) {
            // line 74
            echo "            <tr>
                <td colspan=\"";
            // line 75
            if ((isset($context["hasTokensWithExpireDate"]) || array_key_exists("hasTokensWithExpireDate", $context) ? $context["hasTokensWithExpireDate"] : (function () { throw new RuntimeError('Variable "hasTokensWithExpireDate" does not exist.', 75, $this->source); })())) {
                echo "5";
            } else {
                echo "4";
            }
            echo "\">
                    ";
            // line 76
            echo $this->env->getFilter('translate')->getCallable()("UsersManager_NoTokenCreatedYetCreateNow", (("<a href=\"" . \Piwik\piwik_escape_filter($this->env, $this->env->getFunction('linkTo')->getCallable()(["module" => "UsersManager", "action" => "addNewToken"]), "html_attr")) . "\">"), "</a>");
            echo "
                </td></tr>
            ";
        } else {
            // line 79
            echo "                ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["tokens"]) || array_key_exists("tokens", $context) ? $context["tokens"] : (function () { throw new RuntimeError('Variable "tokens" does not exist.', 79, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["theToken"]) {
                // line 80
                echo "                    <tr>
                        <td><span class=\"creationDate\">";
                // line 81
                echo \Piwik\piwik_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["theToken"], "date_created", [], "any", false, false, false, 81), "html", null, true);
                echo "</span></td>
                        <td>";
                // line 82
                echo \Piwik\piwik_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["theToken"], "description", [], "any", false, false, false, 82), "html", null, true);
                echo "</td>
                        <td>";
                // line 83
                if (twig_get_attribute($this->env, $this->source, $context["theToken"], "last_used", [], "any", false, false, false, 83)) {
                    echo \Piwik\piwik_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["theToken"], "last_used", [], "any", false, false, false, 83), "html", null, true);
                } else {
                    echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("General_Never"), "html", null, true);
                }
                echo "</td>
                        ";
                // line 84
                if ((isset($context["hasTokensWithExpireDate"]) || array_key_exists("hasTokensWithExpireDate", $context) ? $context["hasTokensWithExpireDate"] : (function () { throw new RuntimeError('Variable "hasTokensWithExpireDate" does not exist.', 84, $this->source); })())) {
                    // line 85
                    echo "                            <td title=\"";
                    echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("UsersManager_TokensWithExpireDateCreationBySystem"), "html_attr");
                    echo "\">
                            ";
                    // line 86
                    if (twig_get_attribute($this->env, $this->source, $context["theToken"], "date_expired", [], "any", false, false, false, 86)) {
                        echo \Piwik\piwik_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["theToken"], "date_expired", [], "any", false, false, false, 86), "html", null, true);
                    } else {
                        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("General_Never"), "html", null, true);
                    }
                    // line 87
                    echo "                            </td>
                        ";
                }
                // line 89
                echo "                        <td>
                            <form method=\"post\" action=\"";
                // line 90
                echo \Piwik\piwik_escape_filter($this->env, $this->env->getFunction('linkTo')->getCallable()(["module" => "UsersManager", "action" => "deleteToken"]), "html", null, true);
                echo "\" style=\"display: inline\">
                                <input name=\"nonce\" type=\"hidden\" value=\"";
                // line 91
                echo \Piwik\piwik_escape_filter($this->env, (isset($context["deleteTokenNonce"]) || array_key_exists("deleteTokenNonce", $context) ? $context["deleteTokenNonce"] : (function () { throw new RuntimeError('Variable "deleteTokenNonce" does not exist.', 91, $this->source); })()), "html_attr");
                echo "\">
                                <input name=\"idtokenauth\" type=\"hidden\" value=\"";
                // line 92
                echo \Piwik\piwik_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["theToken"], "idusertokenauth", [], "any", false, false, false, 92), "html_attr");
                echo "\">
                                <button type=\"submit\" class=\"table-action\"
                                        title=\"";
                // line 94
                echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("General_Delete"), "html_attr");
                echo "\">
                                    <span class=\"icon-delete\"></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['theToken'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 101
            echo "            ";
        }
        // line 102
        echo "            </tbody>
        </table>

        <div class=\"tableActionBar\">
            <a href=\"";
        // line 106
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFunction('linkTo')->getCallable()(["module" => "UsersManager", "action" => "addNewToken"]), "html_attr");
        echo "\" class=\"addNewToken\">
                <span class=\"icon-add\"></span>
               ";
        // line 108
        echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("UsersManager_CreateNewToken"), "html", null, true);
        echo "
            </a>

            ";
        // line 111
        if ( !twig_test_empty((isset($context["tokens"]) || array_key_exists("tokens", $context) ? $context["tokens"] : (function () { throw new RuntimeError('Variable "tokens" does not exist.', 111, $this->source); })()))) {
            // line 112
            echo "            <form method=\"post\" action=\"";
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFunction('linkTo')->getCallable()(["module" => "UsersManager", "action" => "deleteToken"]), "html", null, true);
            echo "\" style=\"display: inline\">
                <input name=\"nonce\" type=\"hidden\" value=\"";
            // line 113
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["deleteTokenNonce"]) || array_key_exists("deleteTokenNonce", $context) ? $context["deleteTokenNonce"] : (function () { throw new RuntimeError('Variable "deleteTokenNonce" does not exist.', 113, $this->source); })()), "html_attr");
            echo "\">
                <input name=\"idtokenauth\" type=\"hidden\" value=\"all\">
                <button type=\"submit\" class=\"table-action\">
                    <span class=\"icon-delete\"></span> ";
            // line 116
            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("UsersManager_DeleteAllTokens"), "html", null, true);
            echo "
                </button>
            </form>
            ";
        }
        // line 120
        echo "        </div>

    </div>


";
    }

    public function getTemplateName()
    {
        return "@UsersManager/userSecurity.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  340 => 120,  333 => 116,  327 => 113,  322 => 112,  320 => 111,  314 => 108,  309 => 106,  303 => 102,  300 => 101,  287 => 94,  282 => 92,  278 => 91,  274 => 90,  271 => 89,  267 => 87,  261 => 86,  256 => 85,  254 => 84,  246 => 83,  242 => 82,  238 => 81,  235 => 80,  230 => 79,  224 => 76,  216 => 75,  213 => 74,  211 => 73,  203 => 69,  195 => 68,  191 => 67,  187 => 66,  183 => 65,  177 => 61,  173 => 60,  169 => 59,  164 => 57,  160 => 55,  155 => 53,  149 => 49,  145 => 47,  141 => 46,  137 => 45,  134 => 44,  132 => 43,  129 => 42,  123 => 39,  116 => 35,  109 => 31,  105 => 30,  97 => 25,  93 => 24,  84 => 18,  80 => 17,  74 => 13,  72 => 12,  67 => 10,  62 => 8,  57 => 7,  55 => 6,  51 => 5,  46 => 1,  42 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'admin.twig' %}

{% set title %}{{ 'General_Security'|translate }}{% endset %}

{% block content %}
{% if isUsersAdminEnabled %}
    <div piwik-content-block content-title=\"{{ 'General_ChangePassword'|translate|e('html_attr') }}\" feature=\"true\">
        <form id=\"userSettingsTable\" method=\"post\" action=\"{{ linkTo({'module': 'UsersManager', 'action': 'recordPasswordChange'}) }}\">

            <input type=\"hidden\" value=\"{{ changePasswordNonce|e('html_attr') }}\" name=\"nonce\">

            {% if isValidHost is defined and isValidHost %}

                <div piwik-field uicontrol=\"password\" name=\"password\" autocomplete=\"off\"
                     ng-model=\"personalSettings.password\"
                     ng-change=\"personalSettings.requirePasswordConfirmation()\"
                     data-title=\"{{ 'Login_NewPassword'|translate|e('html_attr') }}\"
                     value=\"\" inline-help=\"{{ 'UsersManager_IfYouWouldLikeToChangeThePasswordTypeANewOne'|translate|e('html_attr') }}\">
                </div>

                <div piwik-field uicontrol=\"password\" name=\"passwordBis\" autocomplete=\"off\"
                     ng-model=\"personalSettings.passwordBis\"
                     ng-change=\"personalSettings.requirePasswordConfirmation()\"
                     data-title=\"{{ 'Login_NewPasswordRepeat'|translate|e('html_attr') }}\"
                     value=\"\" inline-help=\"{{ 'UsersManager_TypeYourPasswordAgain'|translate|e('html_attr') }}\">
                </div>

                <div piwik-field uicontrol=\"password\" name=\"passwordConfirmation\" autocomplete=\"off\"
                     ng-model=\"personalSettings.current_password\"
                     data-title=\"{{ 'UsersManager_YourCurrentPassword'|translate|e('html_attr') }}\"
                     value=\"\" inline-help=\"{{ 'UsersManager_TypeYourCurrentPassword'|translate|e('html_attr') }}\">
                </div>

                <div class=\"alert alert-info\">
                    {{ 'UsersManager_PasswordChangeTerminatesOtherSessions'|translate }}
                </div>

                <input type=\"submit\"
                       value=\"{{ 'General_Save'|translate|e('html_attr') }}\"
                       class=\"btn\"/>
            {% endif %}

            {% if isValidHost is not defined or not isValidHost %}
                <div class=\"alert alert-danger\">
                    {{ 'UsersManager_InjectedHostCannotChangePwd'|translate(invalidHost) }}
                    {% if not isSuperUser %}{{ 'UsersManager_EmailYourAdministrator'|translate(invalidHostMailLinkStart,'</a>')|raw }}{% endif %}
                </div>
            {% endif %}

        </form>
    </div>

    {{ postEvent('Template.userSecurity.afterPassword') }}
{% endif %}

    <a name=\"authtokens\" id=\"authtokens\"></a>
    <div piwik-content-block content-title=\"{{ 'UsersManager_AuthTokens'|translate|e('html_attr') }}\">
        <p>
            {{ 'UsersManager_TokenAuthIntro'|translate }}
            {% if hasTokensWithExpireDate %}{{ 'UsersManager_ExpiredTokensDeleteAutomatically'|translate }}{% endif %}
        </p>
        <table piwik-content-table class=\"listAuthTokens\">
            <thead>
            <tr>
                <th>{{ 'General_CreationDate'|translate }}</th>
                <th>{{ 'General_Description'|translate }}</th>
                <th>{{ 'UsersManager_LastUsed'|translate }}</th>
                {% if hasTokensWithExpireDate %}<th title=\"{{ 'UsersManager_TokensWithExpireDateCreationBySystem'|translate|e('html_attr') }}\">{{ 'UsersManager_ExpireDate'|translate }}</th>{% endif %}
                <th>{{ 'General_Actions'|translate }}</th>
            </tr>
            </thead>
            <tbody>
            {% if tokens is empty %}
            <tr>
                <td colspan=\"{% if hasTokensWithExpireDate %}5{% else %}4{% endif %}\">
                    {{ 'UsersManager_NoTokenCreatedYetCreateNow'|translate('<a href=\"' ~ (linkTo({'module': 'UsersManager', 'action': 'addNewToken'})|e('html_attr'))~ '\">', '</a>')|raw }}
                </td></tr>
            {% else %}
                {% for theToken in tokens %}
                    <tr>
                        <td><span class=\"creationDate\">{{ theToken.date_created }}</span></td>
                        <td>{{ theToken.description }}</td>
                        <td>{% if theToken.last_used %}{{ theToken.last_used }}{% else %}{{ 'General_Never'|translate }}{% endif %}</td>
                        {% if hasTokensWithExpireDate %}
                            <td title=\"{{ 'UsersManager_TokensWithExpireDateCreationBySystem'|translate|e('html_attr') }}\">
                            {% if theToken.date_expired %}{{ theToken.date_expired }}{% else %}{{ 'General_Never'|translate }}{% endif %}
                            </td>
                        {% endif %}
                        <td>
                            <form method=\"post\" action=\"{{ linkTo({'module': 'UsersManager', 'action': 'deleteToken'}) }}\" style=\"display: inline\">
                                <input name=\"nonce\" type=\"hidden\" value=\"{{ deleteTokenNonce|e('html_attr')  }}\">
                                <input name=\"idtokenauth\" type=\"hidden\" value=\"{{ theToken.idusertokenauth|e('html_attr') }}\">
                                <button type=\"submit\" class=\"table-action\"
                                        title=\"{{ 'General_Delete'|translate|e('html_attr') }}\">
                                    <span class=\"icon-delete\"></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                {% endfor %}
            {% endif %}
            </tbody>
        </table>

        <div class=\"tableActionBar\">
            <a href=\"{{ linkTo({'module': 'UsersManager', 'action': 'addNewToken'})|e('html_attr') }}\" class=\"addNewToken\">
                <span class=\"icon-add\"></span>
               {{ 'UsersManager_CreateNewToken'|translate }}
            </a>

            {% if tokens is not empty %}
            <form method=\"post\" action=\"{{ linkTo({'module': 'UsersManager', 'action': 'deleteToken'}) }}\" style=\"display: inline\">
                <input name=\"nonce\" type=\"hidden\" value=\"{{ deleteTokenNonce|e('html_attr')  }}\">
                <input name=\"idtokenauth\" type=\"hidden\" value=\"all\">
                <button type=\"submit\" class=\"table-action\">
                    <span class=\"icon-delete\"></span> {{ 'UsersManager_DeleteAllTokens'|translate }}
                </button>
            </form>
            {% endif %}
        </div>

    </div>


{% endblock %}
", "@UsersManager/userSecurity.twig", "/home/u333978671/domains/ctosweb.com/public_html/Food_Order/public/matomo/plugins/UsersManager/templates/userSecurity.twig");
    }
}
