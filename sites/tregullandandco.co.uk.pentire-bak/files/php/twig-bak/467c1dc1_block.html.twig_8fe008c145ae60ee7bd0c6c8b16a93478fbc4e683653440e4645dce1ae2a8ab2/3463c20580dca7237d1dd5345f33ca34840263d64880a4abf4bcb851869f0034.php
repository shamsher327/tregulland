<?php

/* themes/omni-drupal-theme/omni-portfolio/drupal 8/theme/omni_portfolio/templates/block/block.html.twig */
class __TwigTemplate_4cd357d2e2af1c17407f0f23d21ee4f395b7bea42d907d9fa45396c0195ef32e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $tags = array("set" => 17, "if" => 22, "block" => 28);
        $filters = array("clean_class" => 17, "replace" => 17);
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('set', 'if', 'block'),
                array('clean_class', 'replace'),
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
        ob_start();
        echo "block block-";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, \Drupal\Component\Utility\Html::getClass($this->getAttribute((isset($context["configuration"]) ? $context["configuration"] : null), "provider", array())), "html", null, true));
        echo " ";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, twig_replace_filter(\Drupal\Component\Utility\Html::getClass((isset($context["plugin_id"]) ? $context["plugin_id"] : null)), array("views-blockomni-library-block" => "views", "views-blockomni-library-about-author" => "views", "views-blockomni-library-tags" => "views")), "html", null, true));
        $context["classes"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        echo " 

<div id=\"";
        // line 19
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "id", array()), "html", null, true));
        echo "\" class=\"";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["classes"]) ? $context["classes"] : null), "html", null, true));
        echo " ";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "class", array()), "html", null, true));
        echo "\">
  <div class=\"inner\">
    ";
        // line 21
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title_prefix"]) ? $context["title_prefix"] : null), "html", null, true));
        echo "
    ";
        // line 22
        if ((isset($context["label"]) ? $context["label"] : null)) {
            // line 23
            echo "      <div class=\"title\">
        <h3";
            // line 24
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title_attributes"]) ? $context["title_attributes"] : null), "html", null, true));
            echo ">";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["label"]) ? $context["label"] : null), "html", null, true));
            echo "</h3>
      </div>
    ";
        }
        // line 27
        echo "    ";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title_suffix"]) ? $context["title_suffix"] : null), "html", null, true));
        echo "
    ";
        // line 28
        $this->displayBlock('content', $context, $blocks);
        // line 33
        echo "  </div>
</div>";
    }

    // line 28
    public function block_content($context, array $blocks = array())
    {
        // line 29
        echo "      <div";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content_attributes"]) ? $context["content_attributes"] : null), "addClass", array(0 => "content clearfix"), "method"), "html", null, true));
        echo ">
        ";
        // line 30
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["content"]) ? $context["content"] : null), "html", null, true));
        echo "
      </div>
    ";
    }

    public function getTemplateName()
    {
        return "themes/omni-drupal-theme/omni-portfolio/drupal 8/theme/omni_portfolio/templates/block/block.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  100 => 30,  95 => 29,  92 => 28,  87 => 33,  85 => 28,  80 => 27,  72 => 24,  69 => 23,  67 => 22,  63 => 21,  54 => 19,  44 => 17,);
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
/* {% set classes %}block block-{{ configuration.provider|clean_class }} {{ plugin_id|clean_class|replace({'views-blockomni-library-block':'views', 'views-blockomni-library-about-author':'views',  'views-blockomni-library-tags':'views'}) }}{% endset %} */
/* */
/* <div id="{{ attributes.id }}" class="{{ classes }} {{ attributes.class }}">*/
/*   <div class="inner">*/
/*     {{ title_prefix }}*/
/*     {% if label %}*/
/*       <div class="title">*/
/*         <h3{{ title_attributes }}>{{ label }}</h3>*/
/*       </div>*/
/*     {% endif %}*/
/*     {{ title_suffix }}*/
/*     {% block content %}*/
/*       <div{{ content_attributes.addClass('content clearfix') }}>*/
/*         {{ content }}*/
/*       </div>*/
/*     {% endblock %}*/
/*   </div>*/
/* </div>*/
