<?php

/* themes/omni-drupal-theme/omni-portfolio/drupal 8/theme/omni_portfolio/templates/dataset/item-list.html.twig */
class __TwigTemplate_8e99c0c821f9d3314b008d74923eda273db48fd6e1d6420723d42707e23a9061 extends Twig_Template
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
        $tags = array("if" => 18, "set" => 19, "for" => 27);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('if', 'set', 'for'),
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

        // line 17
        echo "<div class=\"search-result\">
  ";
        // line 18
        if ($this->getAttribute((isset($context["context"]) ? $context["context"] : null), "list_style", array())) {
            // line 19
            $context["attributes"] = $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "addClass", array(0 => ("item-list__" . $this->getAttribute((isset($context["context"]) ? $context["context"] : null), "list_style", array()))), "method");
            // line 20
            echo "  ";
        }
        // line 21
        echo "  ";
        if (((isset($context["items"]) ? $context["items"] : null) || (isset($context["empty"]) ? $context["empty"] : null))) {
            // line 22
            if ( !twig_test_empty((isset($context["title"]) ? $context["title"] : null))) {
                // line 23
                echo "<h3>";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true));
                echo "</h3>";
            }
            // line 25
            if ((isset($context["items"]) ? $context["items"] : null)) {
                // line 26
                echo "<";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["list_type"]) ? $context["list_type"] : null), "html", null, true));
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["attributes"]) ? $context["attributes"] : null), "html", null, true));
                echo ">";
                // line 27
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 28
                    echo "<li";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "attributes", array()), "html", null, true));
                    echo ">";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "value", array()), "html", null, true));
                    echo "</li>";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 30
                echo "</";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["list_type"]) ? $context["list_type"] : null), "html", null, true));
                echo ">";
            } else {
                // line 32
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["empty"]) ? $context["empty"] : null), "html", null, true));
            }
        }
        // line 35
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "themes/omni-drupal-theme/omni-portfolio/drupal 8/theme/omni_portfolio/templates/dataset/item-list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 35,  89 => 32,  84 => 30,  74 => 28,  70 => 27,  65 => 26,  63 => 25,  58 => 23,  56 => 22,  53 => 21,  50 => 20,  48 => 19,  46 => 18,  43 => 17,);
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
/* <div class="search-result">*/
/*   {% if context.list_style %}*/
/*     {%- set attributes = attributes.addClass('item-list__' ~ context.list_style) %}*/
/*   {% endif %}*/
/*   {% if items or empty %}*/
/*     {%- if title is not empty -%}*/
/*       <h3>{{ title }}</h3>*/
/*     {%- endif -%}*/
/*     {%- if items -%}*/
/*       <{{ list_type }}{{ attributes }}>*/
/*         {%- for item in items -%}*/
/*           <li{{ item.attributes }}>{{ item.value }}</li>*/
/*         {%- endfor -%}*/
/*       </{{ list_type }}>*/
/*     {%- else -%}*/
/*       {{- empty -}}*/
/*     {%- endif -%}*/
/*   {%- endif %}*/
/* </div>*/
