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

/* @CoreVisualizations/_dataTableViz_htmlTable.twig */
class __TwigTemplate_f1d923bcbfc6554f634d5c3af90b2a88 extends Template
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
        $context["subtablesAreDisabled"] = (((twig_get_attribute($this->env, $this->source, ($context["properties"] ?? null), "show_goals_columns", [], "any", true, true, false, 1)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["properties"] ?? null), "show_goals_columns", [], "any", false, false, false, 1), false)) : (false)) && ((twig_get_attribute($this->env, $this->source,         // line 2
($context["properties"] ?? null), "disable_subtable_when_show_goals", [], "any", true, true, false, 2)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["properties"] ?? null), "disable_subtable_when_show_goals", [], "any", false, false, false, 2), false)) : (false)));
        // line 3
        $context["showingEmbeddedSubtable"] = ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["properties"]) || array_key_exists("properties", $context) ? $context["properties"] : (function () { throw new RuntimeError('Variable "properties" does not exist.', 3, $this->source); })()), "show_embedded_subtable", [], "any", false, false, false, 3)) && ((        // line 4
array_key_exists("idSubtable", $context)) ? (_twig_default_filter((isset($context["idSubtable"]) || array_key_exists("idSubtable", $context) ? $context["idSubtable"] : (function () { throw new RuntimeError('Variable "idSubtable" does not exist.', 4, $this->source); })()), false)) : (false)));
        // line 5
        if (array_key_exists("error", $context)) {
            // line 6
            echo "    ";
            echo \Piwik\piwik_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 6, $this->source); })()), "message", [], "any", false, false, false, 6), "html", null, true);
            echo "
";
        } else {
            // line 8
            if ( !(isset($context["showingEmbeddedSubtable"]) || array_key_exists("showingEmbeddedSubtable", $context) ? $context["showingEmbeddedSubtable"] : (function () { throw new RuntimeError('Variable "showingEmbeddedSubtable" does not exist.', 8, $this->source); })())) {
                // line 9
                echo "<div class=\"dataTableScroller\">
    <table cellspacing=\"0\" class=\"dataTable\">
        ";
                // line 11
                $this->loadTemplate("@CoreHome/_dataTableHead.twig", "@CoreVisualizations/_dataTableViz_htmlTable.twig", 11)->display($context);
                // line 12
                echo "
        <tbody>";
            }
            // line 15
            if (((isset($context["showingEmbeddedSubtable"]) || array_key_exists("showingEmbeddedSubtable", $context) ? $context["showingEmbeddedSubtable"] : (function () { throw new RuntimeError('Variable "showingEmbeddedSubtable" does not exist.', 15, $this->source); })()) && (isset($context["dataTableHasNoData"]) || array_key_exists("dataTableHasNoData", $context) ? $context["dataTableHasNoData"] : (function () { throw new RuntimeError('Variable "dataTableHasNoData" does not exist.', 15, $this->source); })()))) {
                // line 16
                echo "            ";
                if ((( !array_key_exists("clientSideParameters", $context) ||  !twig_get_attribute($this->env, $this->source, ($context["clientSideParameters"] ?? null), "filter_pattern_recursive", [], "any", true, true, false, 16)) ||  !twig_get_attribute($this->env, $this->source, (isset($context["clientSideParameters"]) || array_key_exists("clientSideParameters", $context) ? $context["clientSideParameters"] : (function () { throw new RuntimeError('Variable "clientSideParameters" does not exist.', 16, $this->source); })()), "filter_pattern_recursive", [], "any", false, false, false, 16))) {
                    // line 17
                    echo "                <tr class=\"nodata\">
                    <td colspan=\"";
                    // line 18
                    echo \Piwik\piwik_escape_filter($this->env, twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["properties"]) || array_key_exists("properties", $context) ? $context["properties"] : (function () { throw new RuntimeError('Variable "properties" does not exist.', 18, $this->source); })()), "columns_to_display", [], "any", false, false, false, 18)), "html", null, true);
                    echo "\">";
                    echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CoreHome_CategoryNoData"), "html", null, true);
                    echo "</td>
                </tr>
            ";
                }
                // line 21
                echo "        ";
            } else {
                // line 22
                echo "            ";
                $context["rowIndex"] = (((twig_get_attribute($this->env, $this->source, ($context["properties"] ?? null), "filter_offset", [], "any", true, true, false, 22)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["properties"] ?? null), "filter_offset", [], "any", false, false, false, 22), 0)) : (0)) + 1);
                // line 23
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["dataTable"]) || array_key_exists("dataTable", $context) ? $context["dataTable"] : (function () { throw new RuntimeError('Variable "dataTable" does not exist.', 23, $this->source); })()), "getRows", [], "method", false, false, false, 23));
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
                foreach ($context['_seq'] as $context["rowId"] => $context["row"]) {
                    // line 24
                    $context["rowHasSubtable"] = (( !(isset($context["subtablesAreDisabled"]) || array_key_exists("subtablesAreDisabled", $context) ? $context["subtablesAreDisabled"] : (function () { throw new RuntimeError('Variable "subtablesAreDisabled" does not exist.', 24, $this->source); })()) && twig_get_attribute($this->env, $this->source, $context["row"], "getIdSubDataTable", [], "method", false, false, false, 24)) &&  !(null === twig_get_attribute($this->env, $this->source, (isset($context["properties"]) || array_key_exists("properties", $context) ? $context["properties"] : (function () { throw new RuntimeError('Variable "properties" does not exist.', 24, $this->source); })()), "subtable_controller_action", [], "any", false, false, false, 24)));
                    // line 25
                    $context["rowSubtableId"] = ((twig_get_attribute($this->env, $this->source, $context["row"], "getMetadata", [0 => "idsubdatatable_in_db"], "method", true, true, false, 25)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["row"], "getMetadata", [0 => "idsubdatatable_in_db"], "method", false, false, false, 25), twig_get_attribute($this->env, $this->source, $context["row"], "getIdSubDataTable", [], "method", false, false, false, 25))) : (twig_get_attribute($this->env, $this->source, $context["row"], "getIdSubDataTable", [], "method", false, false, false, 25)));
                    // line 26
                    $context["isSummaryRow"] = (($context["rowId"] == twig_constant("Piwik\\DataTable::ID_SUMMARY_ROW")) || twig_get_attribute($this->env, $this->source, $context["row"], "getMetadata", [0 => "is_summary"], "method", false, false, false, 26));
                    // line 27
                    $context["shouldHighlightRow"] = ((isset($context["isSummaryRow"]) || array_key_exists("isSummaryRow", $context) ? $context["isSummaryRow"] : (function () { throw new RuntimeError('Variable "isSummaryRow" does not exist.', 27, $this->source); })()) && twig_get_attribute($this->env, $this->source, (isset($context["properties"]) || array_key_exists("properties", $context) ? $context["properties"] : (function () { throw new RuntimeError('Variable "properties" does not exist.', 27, $this->source); })()), "highlight_summary_row", [], "any", false, false, false, 27));
                    // line 28
                    $context["dimensions"] = ((twig_get_attribute($this->env, $this->source, ($context["dataTable"] ?? null), "getMetadata", [0 => "dimensions"], "method", true, true, false, 28)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["dataTable"] ?? null), "getMetadata", [0 => "dimensions"], "method", false, false, false, 28), [])) : ([]));
                    // line 29
                    echo "
                ";
                    // line 31
                    $context["showRow"] = ((((isset($context["subtablesAreDisabled"]) || array_key_exists("subtablesAreDisabled", $context) ? $context["subtablesAreDisabled"] : (function () { throw new RuntimeError('Variable "subtablesAreDisabled" does not exist.', 31, $this->source); })()) ||  !                    // line 32
(isset($context["rowHasSubtable"]) || array_key_exists("rowHasSubtable", $context) ? $context["rowHasSubtable"] : (function () { throw new RuntimeError('Variable "rowHasSubtable" does not exist.', 32, $this->source); })())) ||  !((twig_get_attribute($this->env, $this->source,                     // line 33
($context["properties"] ?? null), "show_expanded", [], "any", true, true, false, 33)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["properties"] ?? null), "show_expanded", [], "any", false, false, false, 33), false)) : (false))) ||  !((twig_get_attribute($this->env, $this->source,                     // line 34
($context["properties"] ?? null), "replace_row_with_subtable", [], "any", true, true, false, 34)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["properties"] ?? null), "replace_row_with_subtable", [], "any", false, false, false, 34), false)) : (false)));
                    // line 36
                    if ((isset($context["showRow"]) || array_key_exists("showRow", $context) ? $context["showRow"] : (function () { throw new RuntimeError('Variable "showRow" does not exist.', 36, $this->source); })())) {
                        // line 37
                        echo "                <tr ";
                        if ((isset($context["rowHasSubtable"]) || array_key_exists("rowHasSubtable", $context) ? $context["rowHasSubtable"] : (function () { throw new RuntimeError('Variable "rowHasSubtable" does not exist.', 37, $this->source); })())) {
                            echo "id=\"";
                            echo \Piwik\piwik_escape_filter($this->env, (isset($context["rowSubtableId"]) || array_key_exists("rowSubtableId", $context) ? $context["rowSubtableId"] : (function () { throw new RuntimeError('Variable "rowSubtableId" does not exist.', 37, $this->source); })()), "html", null, true);
                            echo "\"";
                        }
                        // line 38
                        echo "                    ";
                        if ( !$this->env->getTest('false')->getCallable()(twig_get_attribute($this->env, $this->source, $context["row"], "getMetadata", [0 => "segment"], "method", false, false, false, 38))) {
                            echo " data-segment-filter=\"";
                            echo \Piwik\piwik_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "getMetadata", [0 => "segment"], "method", false, false, false, 38), "html_attr");
                            echo "\"";
                        }
                        // line 39
                        echo "                    ";
                        if ( !$this->env->getTest('false')->getCallable()(twig_get_attribute($this->env, $this->source, $context["row"], "getMetadata", [0 => "url"], "method", false, false, false, 39))) {
                            echo " data-url-label=\"";
                            echo $this->env->getFilter('rawSafeDecoded')->getCallable()(twig_get_attribute($this->env, $this->source, $context["row"], "getMetadata", [0 => "url"], "method", false, false, false, 39));
                            echo "\"";
                        }
                        // line 40
                        echo "                    data-row-metadata=\"";
                        echo \Piwik\piwik_escape_filter($this->env, json_encode(twig_get_attribute($this->env, $this->source, $context["row"], "getMetadata", [], "any", false, false, false, 40)), "html_attr");
                        echo "\"
                    class=\"";
                        // line 41
                        echo \Piwik\piwik_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "getMetadata", [0 => "css_class"], "method", false, false, false, 41), "html", null, true);
                        echo " ";
                        if ((isset($context["rowHasSubtable"]) || array_key_exists("rowHasSubtable", $context) ? $context["rowHasSubtable"] : (function () { throw new RuntimeError('Variable "rowHasSubtable" does not exist.', 41, $this->source); })())) {
                            echo "subDataTable";
                        }
                        if ((isset($context["shouldHighlightRow"]) || array_key_exists("shouldHighlightRow", $context) ? $context["shouldHighlightRow"] : (function () { throw new RuntimeError('Variable "shouldHighlightRow" does not exist.', 41, $this->source); })())) {
                            echo " highlight";
                        }
                        if ((isset($context["isSummaryRow"]) || array_key_exists("isSummaryRow", $context) ? $context["isSummaryRow"] : (function () { throw new RuntimeError('Variable "isSummaryRow" does not exist.', 41, $this->source); })())) {
                            echo " summaryRow";
                        }
                        echo " ";
                        if ((isset($context["isComparing"]) || array_key_exists("isComparing", $context) ? $context["isComparing"] : (function () { throw new RuntimeError('Variable "isComparing" does not exist.', 41, $this->source); })())) {
                            echo "parentComparisonRow";
                        }
                        echo "\"
                        ";
                        // line 42
                        if ((isset($context["rowHasSubtable"]) || array_key_exists("rowHasSubtable", $context) ? $context["rowHasSubtable"] : (function () { throw new RuntimeError('Variable "rowHasSubtable" does not exist.', 42, $this->source); })())) {
                            echo "title=\"";
                            echo \Piwik\piwik_escape_filter($this->env, $this->env->getFilter('translate')->getCallable()("CoreHome_ClickRowToExpandOrContract"), "html", null, true);
                            echo "\"";
                        }
                        // line 43
                        echo "                        ";
                        if ((((array_key_exists("rowIdentifier", $context)) ? (_twig_default_filter((isset($context["rowIdentifier"]) || array_key_exists("rowIdentifier", $context) ? $context["rowIdentifier"] : (function () { throw new RuntimeError('Variable "rowIdentifier" does not exist.', 43, $this->source); })()))) : ("")) != "label")) {
                            echo "data-label=\"";
                            echo \Piwik\piwik_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["row"], "getColumn", [0 => (isset($context["rowIdentifier"]) || array_key_exists("rowIdentifier", $context) ? $context["rowIdentifier"] : (function () { throw new RuntimeError('Variable "rowIdentifier" does not exist.', 43, $this->source); })())], "method", false, false, false, 43)) ? (twig_get_attribute($this->env, $this->source, $context["row"], "getColumn", [0 => (isset($context["rowIdentifier"]) || array_key_exists("rowIdentifier", $context) ? $context["rowIdentifier"] : (function () { throw new RuntimeError('Variable "rowIdentifier" does not exist.', 43, $this->source); })())], "method", false, false, false, 43)) : (twig_get_attribute($this->env, $this->source, $context["row"], "getMetadata", [0 => (isset($context["rowIdentifier"]) || array_key_exists("rowIdentifier", $context) ? $context["rowIdentifier"] : (function () { throw new RuntimeError('Variable "rowIdentifier" does not exist.', 43, $this->source); })())], "method", false, false, false, 43))), "html", null, true);
                            echo "\" data-label-pretty=\"";
                            echo \Piwik\piwik_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "getColumn", [0 => "label"], "method", false, false, false, 43), "html", null, true);
                            echo "\"";
                        }
                        // line 44
                        echo "                >
                    ";
                        // line 45
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["properties"]) || array_key_exists("properties", $context) ? $context["properties"] : (function () { throw new RuntimeError('Variable "properties" does not exist.', 45, $this->source); })()), "columns_to_display", [], "any", false, false, false, 45));
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
                        foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
                            // line 46
                            echo "                        ";
                            $context["cellAttributes"] = twig_get_attribute($this->env, $this->source, (isset($context["visualization"]) || array_key_exists("visualization", $context) ? $context["visualization"] : (function () { throw new RuntimeError('Variable "visualization" does not exist.', 46, $this->source); })()), "getCellHtmlAttributes", [0 => $context["row"], 1 => $context["column"]], "method", false, false, false, 46);
                            // line 47
                            echo "                        <td class=\"";
                            if ((($context["column"] == "label") || twig_in_filter($context["column"], (isset($context["dimensions"]) || array_key_exists("dimensions", $context) ? $context["dimensions"] : (function () { throw new RuntimeError('Variable "dimensions" does not exist.', 47, $this->source); })())))) {
                                echo "label";
                            } else {
                                echo "column";
                            }
                            echo " ";
                            if (twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 47)) {
                                echo "first";
                            }
                            echo " ";
                            echo \Piwik\piwik_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["cellAttributes"] ?? null), "class", [], "any", true, true, false, 47)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["cellAttributes"] ?? null), "class", [], "any", false, false, false, 47))) : ("")), "html_attr");
                            echo "\"
                            ";
                            // line 48
                            if ( !twig_test_empty((isset($context["cellAttributes"]) || array_key_exists("cellAttributes", $context) ? $context["cellAttributes"] : (function () { throw new RuntimeError('Variable "cellAttributes" does not exist.', 48, $this->source); })()))) {
                                $context['_parent'] = $context;
                                $context['_seq'] = twig_ensure_traversable((isset($context["cellAttributes"]) || array_key_exists("cellAttributes", $context) ? $context["cellAttributes"] : (function () { throw new RuntimeError('Variable "cellAttributes" does not exist.', 48, $this->source); })()));
                                foreach ($context['_seq'] as $context["name"] => $context["value"]) {
                                    echo \Piwik\piwik_escape_filter($this->env, $context["name"], "html");
                                    echo "=\"";
                                    echo \Piwik\piwik_escape_filter($this->env, $context["value"], "html_attr");
                                    echo "\" ";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['name'], $context['value'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                            }
                            // line 49
                            echo "                        >
                            ";
                            // line 50
                            if (((isset($context["isComparing"]) || array_key_exists("isComparing", $context) ? $context["isComparing"] : (function () { throw new RuntimeError('Variable "isComparing" does not exist.', 50, $this->source); })()) && ($context["column"] == "label"))) {
                                // line 51
                                echo "                                <span class=\"prefix-numeral\">";
                                echo \Piwik\piwik_escape_filter($this->env, (isset($context["rowIndex"]) || array_key_exists("rowIndex", $context) ? $context["rowIndex"] : (function () { throw new RuntimeError('Variable "rowIndex" does not exist.', 51, $this->source); })()), "html", null, true);
                                echo ".</span>
                            ";
                            }
                            // line 53
                            echo "
                            ";
                            // line 54
                            $this->loadTemplate("@CoreHome/_dataTableCell.twig", "@CoreVisualizations/_dataTableViz_htmlTable.twig", 54)->display(twig_array_merge($context, (isset($context["properties"]) || array_key_exists("properties", $context) ? $context["properties"] : (function () { throw new RuntimeError('Variable "properties" does not exist.', 54, $this->source); })())));
                            // line 55
                            echo "                        </td>
                    ";
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
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['column'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 57
                        echo "                </tr>

                ";
                        // line 59
                        if (twig_get_attribute($this->env, $this->source, $context["row"], "getComparisons", [], "method", false, false, false, 59)) {
                            // line 60
                            echo "                ";
                            $this->loadTemplate("@CoreVisualizations/_dataTableViz_htmlTable_comparisons.twig", "@CoreVisualizations/_dataTableViz_htmlTable.twig", 60)->display(twig_array_merge($context, ["comparedRow" =>                             // line 61
$context["row"], "dataTable" => twig_get_attribute($this->env, $this->source,                             // line 62
$context["row"], "getComparisons", [], "method", false, false, false, 62), "rootDataTable" =>                             // line 63
(isset($context["dataTable"]) || array_key_exists("dataTable", $context) ? $context["dataTable"] : (function () { throw new RuntimeError('Variable "dataTable" does not exist.', 63, $this->source); })()), "dimensions" =>                             // line 64
(isset($context["dimensions"]) || array_key_exists("dimensions", $context) ? $context["dimensions"] : (function () { throw new RuntimeError('Variable "dimensions" does not exist.', 64, $this->source); })())]));
                            // line 66
                            echo "                ";
                        }
                        // line 67
                        echo "                ";
                    }
                    // line 68
                    echo "
                ";
                    // line 70
                    echo "                ";
                    if ((((twig_get_attribute($this->env, $this->source, ($context["properties"] ?? null), "show_expanded", [], "any", true, true, false, 70)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["properties"] ?? null), "show_expanded", [], "any", false, false, false, 70), false)) : (false)) && (isset($context["rowHasSubtable"]) || array_key_exists("rowHasSubtable", $context) ? $context["rowHasSubtable"] : (function () { throw new RuntimeError('Variable "rowHasSubtable" does not exist.', 70, $this->source); })()))) {
                        // line 71
                        echo "                    ";
                        $this->loadTemplate("@CoreVisualizations/_dataTableViz_htmlTable.twig", "@CoreVisualizations/_dataTableViz_htmlTable.twig", 71)->display(twig_array_merge($context, ["dataTable" => twig_get_attribute($this->env, $this->source, $context["row"], "getSubtable", [], "method", false, false, false, 71), "idSubtable" => (isset($context["rowSubtableId"]) || array_key_exists("rowSubtableId", $context) ? $context["rowSubtableId"] : (function () { throw new RuntimeError('Variable "rowSubtableId" does not exist.', 71, $this->source); })())]));
                        // line 72
                        echo "                ";
                    }
                    // line 73
                    echo "
                ";
                    // line 74
                    $context["rowIndex"] = ((isset($context["rowIndex"]) || array_key_exists("rowIndex", $context) ? $context["rowIndex"] : (function () { throw new RuntimeError('Variable "rowIndex" does not exist.', 74, $this->source); })()) + 1);
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
                unset($context['_seq'], $context['_iterated'], $context['rowId'], $context['row'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 76
                if ((twig_get_attribute($this->env, $this->source, (isset($context["dataTable"]) || array_key_exists("dataTable", $context) ? $context["dataTable"] : (function () { throw new RuntimeError('Variable "dataTable" does not exist.', 76, $this->source); })()), "getTotalsRow", [], "any", false, false, false, 76) && twig_get_attribute($this->env, $this->source, (isset($context["properties"]) || array_key_exists("properties", $context) ? $context["properties"] : (function () { throw new RuntimeError('Variable "properties" does not exist.', 76, $this->source); })()), "show_totals_row", [], "any", false, false, false, 76))) {
                    // line 77
                    echo "                ";
                    $context["row"] = twig_get_attribute($this->env, $this->source, (isset($context["dataTable"]) || array_key_exists("dataTable", $context) ? $context["dataTable"] : (function () { throw new RuntimeError('Variable "dataTable" does not exist.', 77, $this->source); })()), "getTotalsRow", [], "any", false, false, false, 77);
                    // line 78
                    echo "                ";
                    $context["rowId"] = "totalsRow";
                    // line 79
                    echo "                <tr class=\"";
                    echo \Piwik\piwik_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["row"]) || array_key_exists("row", $context) ? $context["row"] : (function () { throw new RuntimeError('Variable "row" does not exist.', 79, $this->source); })()), "getMetadata", [0 => "css_class"], "method", false, false, false, 79), "html", null, true);
                    echo " totalsRow\"
                        title=\"Total values for this table\">
                    ";
                    // line 81
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["properties"]) || array_key_exists("properties", $context) ? $context["properties"] : (function () { throw new RuntimeError('Variable "properties" does not exist.', 81, $this->source); })()), "columns_to_display", [], "any", false, false, false, 81));
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
                    foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
                        // line 82
                        echo "                        <td class=\"";
                        if (($context["column"] == "label")) {
                            echo "label";
                        } else {
                            echo "column";
                        }
                        echo " ";
                        if (twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 82)) {
                            echo "first";
                        }
                        echo "\">
                            ";
                        // line 83
                        $this->loadTemplate("@CoreHome/_dataTableCell.twig", "@CoreVisualizations/_dataTableViz_htmlTable.twig", 83)->display(twig_array_merge($context, (isset($context["properties"]) || array_key_exists("properties", $context) ? $context["properties"] : (function () { throw new RuntimeError('Variable "properties" does not exist.', 83, $this->source); })())));
                        // line 84
                        echo "                        </td>
                    ";
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
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['column'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 86
                    echo "                </tr>
            ";
                }
                // line 88
                echo "        ";
            }
            // line 89
            if ( !(isset($context["showingEmbeddedSubtable"]) || array_key_exists("showingEmbeddedSubtable", $context) ? $context["showingEmbeddedSubtable"] : (function () { throw new RuntimeError('Variable "showingEmbeddedSubtable" does not exist.', 89, $this->source); })())) {
                // line 90
                echo "</tbody>
    </table>
    </div>";
            }
        }
    }

    public function getTemplateName()
    {
        return "@CoreVisualizations/_dataTableViz_htmlTable.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  382 => 90,  380 => 89,  377 => 88,  373 => 86,  358 => 84,  356 => 83,  343 => 82,  326 => 81,  320 => 79,  317 => 78,  314 => 77,  312 => 76,  298 => 74,  295 => 73,  292 => 72,  289 => 71,  286 => 70,  283 => 68,  280 => 67,  277 => 66,  275 => 64,  274 => 63,  273 => 62,  272 => 61,  270 => 60,  268 => 59,  264 => 57,  249 => 55,  247 => 54,  244 => 53,  238 => 51,  236 => 50,  233 => 49,  219 => 48,  204 => 47,  201 => 46,  184 => 45,  181 => 44,  172 => 43,  166 => 42,  148 => 41,  143 => 40,  136 => 39,  129 => 38,  122 => 37,  120 => 36,  118 => 34,  117 => 33,  116 => 32,  115 => 31,  112 => 29,  110 => 28,  108 => 27,  106 => 26,  104 => 25,  102 => 24,  85 => 23,  82 => 22,  79 => 21,  71 => 18,  68 => 17,  65 => 16,  63 => 15,  59 => 12,  57 => 11,  53 => 9,  51 => 8,  45 => 6,  43 => 5,  41 => 4,  40 => 3,  38 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{%- set subtablesAreDisabled = properties.show_goals_columns|default(false)
                           and properties.disable_subtable_when_show_goals|default(false) -%}
{%- set showingEmbeddedSubtable = properties.show_embedded_subtable is not empty
                              and idSubtable|default(false) -%}
{% if error is defined %}
    {{ error.message }}
{% else %}
    {%- if not showingEmbeddedSubtable -%}
    <div class=\"dataTableScroller\">
    <table cellspacing=\"0\" class=\"dataTable\">
        {% include \"@CoreHome/_dataTableHead.twig\" %}

        <tbody>
    {%- endif -%}
        {% if showingEmbeddedSubtable and dataTableHasNoData %}
            {% if clientSideParameters is not defined or clientSideParameters.filter_pattern_recursive is not defined or not clientSideParameters.filter_pattern_recursive  %}
                <tr class=\"nodata\">
                    <td colspan=\"{{ properties.columns_to_display|length }}\">{{ 'CoreHome_CategoryNoData'|translate }}</td>
                </tr>
            {% endif %}
        {% else %}
            {% set rowIndex = properties.filter_offset|default(0) + 1 %}
            {%- for rowId, row in dataTable.getRows() -%}
                {%- set rowHasSubtable = not subtablesAreDisabled and row.getIdSubDataTable() and properties.subtable_controller_action is not null -%}
                {%- set rowSubtableId = row.getMetadata('idsubdatatable_in_db')|default(row.getIdSubDataTable()) -%}
                {%- set isSummaryRow = rowId == constant('Piwik\\\\DataTable::ID_SUMMARY_ROW') or row.getMetadata('is_summary') -%}
                {%- set shouldHighlightRow = isSummaryRow and properties.highlight_summary_row -%}
                {% set dimensions = dataTable.getMetadata('dimensions')|default([]) %}

                {# display this row if it doesn't have a subtable or if we don't replace the row with the subtable #}
                {%- set showRow = subtablesAreDisabled
                               or not rowHasSubtable
                               or not properties.show_expanded|default(false)
                               or not properties.replace_row_with_subtable|default(false) -%}

                {% if showRow %}
                <tr {% if rowHasSubtable %}id=\"{{ rowSubtableId }}\"{% endif %}
                    {% if row.getMetadata('segment') is not false %} data-segment-filter=\"{{ row.getMetadata('segment')|e('html_attr') }}\"{% endif %}
                    {% if row.getMetadata('url') is not false %} data-url-label=\"{{ row.getMetadata('url')|rawSafeDecoded }}\"{% endif %}
                    data-row-metadata=\"{{ row.getMetadata|json_encode|e('html_attr') }}\"
                    class=\"{{ row.getMetadata('css_class') }} {% if rowHasSubtable %}subDataTable{% endif %}{% if shouldHighlightRow %} highlight{% endif %}{% if isSummaryRow %} summaryRow{% endif %} {% if isComparing %}parentComparisonRow{% endif %}\"
                        {% if rowHasSubtable %}title=\"{{ 'CoreHome_ClickRowToExpandOrContract'|translate }}\"{% endif %}
                        {% if rowIdentifier|default != 'label' %}data-label=\"{{ row.getColumn(rowIdentifier) ? row.getColumn(rowIdentifier) : row.getMetadata(rowIdentifier) }}\" data-label-pretty=\"{{ row.getColumn('label') }}\"{% endif %}
                >
                    {% for column in properties.columns_to_display %}
                        {% set cellAttributes = visualization.getCellHtmlAttributes(row, column) %}
                        <td class=\"{% if column =='label' or column in dimensions %}label{% else %}column{% endif %} {% if loop.first %}first{% endif %} {{ cellAttributes.class|default|e('html_attr') }}\"
                            {% if cellAttributes is not empty %}{% for name, value in cellAttributes %}{{ name|e('html') }}=\"{{ value|e('html_attr') }}\" {% endfor %}{% endif %}
                        >
                            {% if isComparing and column == 'label' %}
                                <span class=\"prefix-numeral\">{{ rowIndex }}.</span>
                            {% endif %}

                            {% include \"@CoreHome/_dataTableCell.twig\" with properties %}
                        </td>
                    {% endfor %}
                </tr>

                {% if row.getComparisons() %}
                {% include \"@CoreVisualizations/_dataTableViz_htmlTable_comparisons.twig\" with {
                    'comparedRow': row,
                    'dataTable': row.getComparisons(),
                    'rootDataTable': dataTable,
                    'dimensions': dimensions,
                } %}
                {% endif %}
                {% endif %}

                {# display subtable if present and showing expanded datatable #}
                {% if properties.show_expanded|default(false) and rowHasSubtable %}
                    {% include \"@CoreVisualizations/_dataTableViz_htmlTable.twig\" with {'dataTable': row.getSubtable(), 'idSubtable': rowSubtableId} %}
                {% endif %}

                {% set rowIndex = rowIndex + 1 %}
            {%- endfor -%}
            {% if dataTable.getTotalsRow and properties.show_totals_row %}
                {% set row = dataTable.getTotalsRow %}
                {% set rowId = 'totalsRow' %}
                <tr class=\"{{ row.getMetadata('css_class') }} totalsRow\"
                        title=\"Total values for this table\">
                    {% for column in properties.columns_to_display %}
                        <td class=\"{% if column =='label' %}label{% else %}column{% endif %} {% if loop.first %}first{% endif %}\">
                            {% include \"@CoreHome/_dataTableCell.twig\" with properties %}
                        </td>
                    {% endfor %}
                </tr>
            {% endif %}
        {% endif %}
    {%- if not showingEmbeddedSubtable -%}
        </tbody>
    </table>
    </div>
    {%- endif -%}
{% endif %}
", "@CoreVisualizations/_dataTableViz_htmlTable.twig", "/home/u333978671/domains/ctosweb.com/public_html/Food_Order/public/matomo/plugins/CoreVisualizations/templates/_dataTableViz_htmlTable.twig");
    }
}
