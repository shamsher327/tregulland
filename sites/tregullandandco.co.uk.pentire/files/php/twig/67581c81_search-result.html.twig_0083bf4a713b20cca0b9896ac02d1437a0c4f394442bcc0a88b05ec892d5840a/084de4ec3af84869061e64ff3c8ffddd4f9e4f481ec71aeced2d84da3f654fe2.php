<?php

/* themes/custom/tregullandandcowhite/templates/system/search-result.html.twig */
class __TwigTemplate_310181a09bfbbe137270ec4947b72e2764495d102ec9a2b2535db980bf26db5a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $tags = array("if" => 66);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('if'),
                array(),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setTemplateFile($this->getTemplateName());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 61
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title_prefix"]) ? $context["title_prefix"] : null), "html", null, true));
        echo "
<h3";
        // line 62
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title_attributes"]) ? $context["title_attributes"] : null), "html", null, true));
        echo ">
  <a href=\"";
        // line 63
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true));
        echo "\">";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true));
        echo "</a>
</h3>
";
        // line 65
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title_suffix"]) ? $context["title_suffix"] : null), "html", null, true));
        echo "
";
        // line 66
        if ((isset($context["snippet"]) ? $context["snippet"] : null)) {
            // line 67
            echo "  <p";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["content_attributes"]) ? $context["content_attributes"] : null), "html", null, true));
            echo ">";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["snippet"]) ? $context["snippet"] : null), "html", null, true));
            echo "</p>
";
        }
        // line 69
        if ((isset($context["info"]) ? $context["info"] : null)) {
            // line 70
            echo "  <p>";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["info"]) ? $context["info"] : null), "html", null, true));
            echo "</p>
";
        }
        // line 72
        echo "<hr class=\"search-result-divider\">
";
    }

    public function getTemplateName()
    {
        return "themes/custom/tregullandandcowhite/templates/system/search-result.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 72,  74 => 70,  72 => 69,  64 => 67,  62 => 66,  58 => 65,  51 => 63,  47 => 62,  43 => 61,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Default theme implementation for displaying a single search result.*/
/*  **/
/*  * This template renders a single search result. The list of results is*/
/*  * rendered using '#theme' => 'item_list', with suggestions of:*/
/*  * - item_list__search_results__(plugin_id)*/
/*  * - item_list__search_results*/
/*  **/
/*  * Available variables:*/
/*  * - url: URL of the result.*/
/*  * - title: Title of the result.*/
/*  * - snippet: A small preview of the result. Does not apply to user searches.*/
/*  * - info: String of all the meta information ready for print. Does not apply*/
/*  *   to user searches.*/
/*  * - plugin_id: The machine-readable name of the plugin being executed,such*/
/*  *   as "node_search" or "user_search".*/
/*  * - title_prefix: Additional output populated by modules, intended to be*/
/*  *   displayed in front of the main title tag that appears in the template.*/
/*  * - title_suffix: Additional output populated by modules, intended to be*/
/*  *   displayed after the main title tag that appears in the template.*/
/*  * - info_split: Contains same data as info, but split into separate parts.*/
/*  *   - info_split.type: Node type (or item type string supplied by module).*/
/*  *   - info_split.user: Author of the node linked to users profile. Depends*/
/*  *     on permission.*/
/*  *   - info_split.date: Last update of the node. Short formatted.*/
/*  *   - info_split.comment: Number of comments output as "% comments", %*/
/*  *     being the count. (Depends on comment.module).*/
/*  * @todo The info variable needs to be made drillable and each of these sub*/
/*  *   items should instead be within info and renamed info.foo, info.bar, etc.*/
/*  **/
/*  * Other variables:*/
/*  * - title_attributes: HTML attributes for the title.*/
/*  * - content_attributes: HTML attributes for the content.*/
/*  **/
/*  * Since info_split is keyed, a direct print of the item is possible.*/
/*  * This array does not apply to user searches so it is recommended to check*/
/*  * for its existence before printing. The default keys of 'type', 'user' and*/
/*  * 'date' always exist for node searches. Modules may provide other data.*/
/*  * @code*/
/*  *   {% if (info_split.comment) %}*/
/*  *     <span class="info-comment">*/
/*  *       {{ info_split.comment }}*/
/*  *     </span>*/
/*  *   {% endif %}*/
/*  * @endcode*/
/*  **/
/*  * To check for all available data within info_split, use the code below.*/
/*  * @code*/
/*  *   <pre>*/
/*  *     {{ dump(info_split) }}*/
/*  *   </pre>*/
/*  * @endcode*/
/*  **/
/*  * @see template_preprocess_search_result()*/
/*  **/
/*  * @ingroup themeable*/
/*  *//* */
/* #}*/
/* {{ title_prefix }}*/
/* <h3{{ title_attributes }}>*/
/*   <a href="{{ url }}">{{ title }}</a>*/
/* </h3>*/
/* {{ title_suffix }}*/
/* {% if snippet %}*/
/*   <p{{ content_attributes }}>{{ snippet }}</p>*/
/* {% endif %}*/
/* {% if info %}*/
/*   <p>{{ info }}</p>*/
/* {% endif %}*/
/* <hr class="search-result-divider">*/
/* */
