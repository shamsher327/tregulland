<?php

/* themes/omni-drupal-theme/omni-portfolio/drupal 8/theme/omni_portfolio/templates/content/page-title.html.twig */
class __TwigTemplate_06a8f78517f985d3413f144946b488bcaab0e56794a1cd19040397eae7920570 extends Twig_Template
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
        $tags = array("if" => 18);
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

        // line 17
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title_prefix"]) ? $context["title_prefix"] : null), "html", null, true));
        echo "
";
        // line 18
        if ((isset($context["title"]) ? $context["title"] : null)) {
            // line 19
            echo "  <h1 id=\"content-title\">";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true));
            echo "</h1>
";
        }
        // line 21
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title_suffix"]) ? $context["title_suffix"] : null), "html", null, true));
        echo "
";
    }

    public function getTemplateName()
    {
        return "themes/omni-drupal-theme/omni-portfolio/drupal 8/theme/omni_portfolio/templates/content/page-title.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 21,  49 => 19,  47 => 18,  43 => 17,);
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
/* {{ title_prefix }}*/
/* {% if title %}*/
/*   <h1 id="content-title">{{ title }}</h1>*/
/* {% endif %}*/
/* {{ title_suffix }}*/
/* */
