<?php

/* themes/omni-drupal-theme/omni-portfolio/drupal 8/theme/omni_portfolio/templates/content/node--page.html.twig */
class __TwigTemplate_f0c815adc03913c15e6ae149bc804da1abaf0f901a8d8fc2aa5a08fe9697b2e9 extends Twig_Template
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
        $tags = array("if" => 17);
        $filters = array("t" => 25, "without" => 31);
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('if'),
                array('t', 'without'),
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

        // line 17
        if ( !(isset($context["page"]) ? $context["page"] : null)) {
            // line 18
            echo "  <article";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "addClass", array(0 => "node basic teaser clearfix"), "method"), "html", null, true));
            echo ">
    <header>
      ";
            // line 20
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title_prefix"]) ? $context["title_prefix"] : null), "html", null, true));
            echo "
        <h2 class=\"title\"><a href=\"";
            // line 21
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true));
            echo "\" rel=\"bookmark\">";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["label"]) ? $context["label"] : null), "html", null, true));
            echo "</a></h2>
      ";
            // line 22
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title_suffix"]) ? $context["title_suffix"] : null), "html", null, true));
            echo "
      ";
            // line 23
            if ((isset($context["display_submitted"]) ? $context["display_submitted"] : null)) {
                // line 24
                echo "        <div class=\"meta\">
          <span class=\"author\">";
                // line 25
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar(t("Author")));
                echo ": ";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["author_name"]) ? $context["author_name"] : null), "html", null, true));
                echo "</span> /
          <span class=\"date\">";
                // line 26
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar(t("Date")));
                echo ": ";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["date"]) ? $context["date"] : null), "html", null, true));
                echo "</span>     
        </div>
      ";
            }
            // line 29
            echo "    </header>    
    <div class=\"content\">
      ";
            // line 31
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, twig_without((isset($context["content"]) ? $context["content"] : null), "comment", "links"), "html", null, true));
            echo "
    </div>
    <a href=\"";
            // line 33
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true));
            echo "\" class=\"link button\">";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar(t("read more ...")));
            echo "</a>
  </article>
";
        } else {
            // line 36
            echo "  <article";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "addClass", array(0 => "node basic full clearfix"), "method"), "html", null, true));
            echo ">
    <header>
      <h1 class=\"title\">";
            // line 38
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["label"]) ? $context["label"] : null), "html", null, true));
            echo "</h1>
    </header>
    ";
            // line 40
            if ((isset($context["display_submitted"]) ? $context["display_submitted"] : null)) {
                // line 41
                echo "      <div class=\"meta\">
        <span class=\"author\">";
                // line 42
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar(t("Author")));
                echo ": ";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["author_name"]) ? $context["author_name"] : null), "html", null, true));
                echo "</span> /
        <span class=\"date\">";
                // line 43
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar(t("Date")));
                echo ": ";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["date"]) ? $context["date"] : null), "html", null, true));
                echo "</span>     
      </div>
    ";
            }
            // line 46
            echo "    <div class=\"content clearfix\">
      ";
            // line 47
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, twig_without((isset($context["content"]) ? $context["content"] : null), "comment", "links"), "html", null, true));
            echo "
    </div>
  </article>
  ";
            // line 50
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "comment", array()), "html", null, true));
            echo "
";
        }
    }

    public function getTemplateName()
    {
        return "themes/omni-drupal-theme/omni-portfolio/drupal 8/theme/omni_portfolio/templates/content/node--page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  140 => 50,  134 => 47,  131 => 46,  123 => 43,  117 => 42,  114 => 41,  112 => 40,  107 => 38,  101 => 36,  93 => 33,  88 => 31,  84 => 29,  76 => 26,  70 => 25,  67 => 24,  65 => 23,  61 => 22,  55 => 21,  51 => 20,  45 => 18,  43 => 17,);
    }
}
/* {#*/
/* /* COPYRIGHT*/
/* ------------------------------------------------------------------  */
/*   Omni for Drupal 8.x - Version 1.0                           */
/*   Copyright (C) 2016 esors.com All Rights Reserved.           */
/*   @license - Copyrighted Commercial Software                   */
/* ------------------------------------------------------------------  */
/*   Theme Name: Omni Portfolio                                           */
/*   Author: ESORS                                           */
/*   Date: 19th August 2016                                        */
/*   Website: http://www.esors.com/                              */
/* ------------------------------------------------------------------  */
/*   This file may not be redistributed in whole or   */
/*   significant part.                                            */
/* ----------------------------------------------------------------*//* */
/* #}*/
/* {% if not page %}*/
/*   <article{{ attributes.addClass('node basic teaser clearfix') }}>*/
/*     <header>*/
/*       {{ title_prefix }}*/
/*         <h2 class="title"><a href="{{ url }}" rel="bookmark">{{ label }}</a></h2>*/
/*       {{ title_suffix }}*/
/*       {% if display_submitted %}*/
/*         <div class="meta">*/
/*           <span class="author">{{ 'Author'|t }}: {{ author_name }}</span> /*/
/*           <span class="date">{{ 'Date'|t }}: {{ date }}</span>     */
/*         </div>*/
/*       {% endif %}*/
/*     </header>    */
/*     <div class="content">*/
/*       {{ content|without('comment', 'links') }}*/
/*     </div>*/
/*     <a href="{{ url }}" class="link button">{{ 'read more ...'|t }}</a>*/
/*   </article>*/
/* {% else %}*/
/*   <article{{ attributes.addClass('node basic full clearfix') }}>*/
/*     <header>*/
/*       <h1 class="title">{{ label }}</h1>*/
/*     </header>*/
/*     {% if display_submitted %}*/
/*       <div class="meta">*/
/*         <span class="author">{{ 'Author'|t }}: {{ author_name }}</span> /*/
/*         <span class="date">{{ 'Date'|t }}: {{ date }}</span>     */
/*       </div>*/
/*     {% endif %}*/
/*     <div class="content clearfix">*/
/*       {{ content|without('comment', 'links') }}*/
/*     </div>*/
/*   </article>*/
/*   {{ content.comment }}*/
/* {% endif %}*/
