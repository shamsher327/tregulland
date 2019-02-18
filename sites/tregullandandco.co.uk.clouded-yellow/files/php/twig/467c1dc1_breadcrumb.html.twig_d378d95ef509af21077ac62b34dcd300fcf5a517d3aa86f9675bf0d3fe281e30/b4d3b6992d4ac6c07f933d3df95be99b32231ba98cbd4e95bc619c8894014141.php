<?php

/* themes/omni-drupal-theme/omni-portfolio/drupal 8/theme/omni_portfolio/templates/navigation/breadcrumb.html.twig */
class __TwigTemplate_86967221e78119f3e50accdf5d5236a2dbd78b16594878c341db34819447f17f extends Twig_Template
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
        $tags = array("set" => 17, "if" => 18, "for" => 23);
        $filters = array("length" => 17, "t" => 21);
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('set', 'if', 'for'),
                array('length', 't'),
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
        $context["size"] = twig_length_filter($this->env, (isset($context["breadcrumb"]) ? $context["breadcrumb"] : null));
        // line 18
        if (((isset($context["breadcrumb"]) ? $context["breadcrumb"] : null) && ((isset($context["size"]) ? $context["size"] : null) > 1))) {
            // line 19
            echo "  <div id=\"breadcrumb\">
    <nav aria-label=\"You are here:\" aria-labelledby=\"system-breadcrumb\" role=\"navigation\">
      <h2 class=\"visually-hidden\">";
            // line 21
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar(t("Breadcrumb")));
            echo "</h2>
      <ul class=\"breadcrumbs\">
      ";
            // line 23
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumb"]) ? $context["breadcrumb"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 24
                echo "        <li>
          ";
                // line 25
                if ($this->getAttribute($context["item"], "url", array())) {
                    // line 26
                    echo "            <a href=\"";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "url", array()), "html", null, true));
                    echo "\">";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "text", array()), "html", null, true));
                    echo "</a>
          ";
                } else {
                    // line 28
                    echo "            ";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "text", array()), "html", null, true));
                    echo "
          ";
                }
                // line 30
                echo "        </li>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 32
            echo "      </ul>
    </nav>
  </div>
";
        }
    }

    public function getTemplateName()
    {
        return "themes/omni-drupal-theme/omni-portfolio/drupal 8/theme/omni_portfolio/templates/navigation/breadcrumb.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 32,  79 => 30,  73 => 28,  65 => 26,  63 => 25,  60 => 24,  56 => 23,  51 => 21,  47 => 19,  45 => 18,  43 => 17,);
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
/* {% set size = breadcrumb|length %}*/
/* {% if breadcrumb and size > 1 %}*/
/*   <div id="breadcrumb">*/
/*     <nav aria-label="You are here:" aria-labelledby="system-breadcrumb" role="navigation">*/
/*       <h2 class="visually-hidden">{{ 'Breadcrumb'|t }}</h2>*/
/*       <ul class="breadcrumbs">*/
/*       {% for item in breadcrumb %}*/
/*         <li>*/
/*           {% if item.url %}*/
/*             <a href="{{ item.url }}">{{ item.text }}</a>*/
/*           {% else %}*/
/*             {{ item.text }}*/
/*           {% endif %}*/
/*         </li>*/
/*       {% endfor %}*/
/*       </ul>*/
/*     </nav>*/
/*   </div>*/
/* {% endif %}*/
/* */
