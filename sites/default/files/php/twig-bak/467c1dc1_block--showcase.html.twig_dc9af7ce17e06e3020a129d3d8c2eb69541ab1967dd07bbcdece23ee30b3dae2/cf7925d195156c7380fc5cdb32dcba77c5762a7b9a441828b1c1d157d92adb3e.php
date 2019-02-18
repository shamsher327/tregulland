<?php

/* themes/omni-drupal-theme/omni-portfolio/drupal 8/theme/omni_portfolio/templates/block/block--showcase.html.twig */
class __TwigTemplate_b15b17749b1b08d5fee98a05685cf8ebfebe2d0206b54612985c7f22e25ea60e extends Twig_Template
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
        $tags = array("set" => 17, "if" => 19);
        $filters = array("raw" => 20);
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('set', 'if'),
                array('raw'),
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
        $context["showcase_type"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_showcase_type", array()), "value", array());
        // line 18
        echo "
";
        // line 19
        if (((isset($context["showcase_type"]) ? $context["showcase_type"] : null) == "main")) {
            // line 20
            echo "  <div class=\"showcase showcase-basic style-main\"";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar((isset($context["data_slick"]) ? $context["data_slick"] : null)));
            echo ">
    ";
            // line 21
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_showcase_slide", array()), "html", null, true));
            echo "
  </div>  
";
        } elseif ((        // line 23
(isset($context["showcase_type"]) ? $context["showcase_type"] : null) == "gallery")) {
            // line 24
            echo "  <div class=\"showcase showcase-gallery\"";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar((isset($context["data_slick"]) ? $context["data_slick"] : null)));
            echo ">
    ";
            // line 25
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_showcase_slide", array()), "html", null, true));
            echo "
  </div>  
";
        } else {
            // line 28
            echo "  <div class=\"showcase showcase-basic style-";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["showcase_type"]) ? $context["showcase_type"] : null), "html", null, true));
            echo "\"";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar((isset($context["data_slick"]) ? $context["data_slick"] : null)));
            echo ">
    ";
            // line 29
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_showcase_slide", array()), "html", null, true));
            echo "
  </div>  
";
        }
    }

    public function getTemplateName()
    {
        return "themes/omni-drupal-theme/omni-portfolio/drupal 8/theme/omni_portfolio/templates/block/block--showcase.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 29,  73 => 28,  67 => 25,  62 => 24,  60 => 23,  55 => 21,  50 => 20,  48 => 19,  45 => 18,  43 => 17,);
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
/* {% set showcase_type = block_content.field_showcase_type.value %}*/
/* */
/* {% if showcase_type == 'main' %}*/
/*   <div class="showcase showcase-basic style-main"{{data_slick|raw}}>*/
/*     {{ content.field_showcase_slide }}*/
/*   </div>  */
/* {% elseif showcase_type == 'gallery' %}*/
/*   <div class="showcase showcase-gallery"{{data_slick|raw}}>*/
/*     {{ content.field_showcase_slide }}*/
/*   </div>  */
/* {% else %}*/
/*   <div class="showcase showcase-basic style-{{showcase_type}}"{{data_slick|raw}}>*/
/*     {{ content.field_showcase_slide }}*/
/*   </div>  */
/* {% endif %}*/
