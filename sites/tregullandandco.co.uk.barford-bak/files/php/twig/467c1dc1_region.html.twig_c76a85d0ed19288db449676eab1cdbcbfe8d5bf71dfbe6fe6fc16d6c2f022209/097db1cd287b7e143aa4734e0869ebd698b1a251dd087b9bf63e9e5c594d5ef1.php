<?php

/* themes/omni-drupal-theme/omni-portfolio/drupal 8/theme/omni_portfolio/templates/layout/region.html.twig */
class __TwigTemplate_58f5071bcb8b6a8315f74dcd24f01e96524c8e1e04ca1240b26728daabb9fc79 extends Twig_Template
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
        if ((isset($context["content"]) ? $context["content"] : null)) {
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["content"]) ? $context["content"] : null), "html", null, true));
        }
    }

    public function getTemplateName()
    {
        return "themes/omni-drupal-theme/omni-portfolio/drupal 8/theme/omni_portfolio/templates/layout/region.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 17,);
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
/* {% if content %}{{ content }}{% endif %}*/
