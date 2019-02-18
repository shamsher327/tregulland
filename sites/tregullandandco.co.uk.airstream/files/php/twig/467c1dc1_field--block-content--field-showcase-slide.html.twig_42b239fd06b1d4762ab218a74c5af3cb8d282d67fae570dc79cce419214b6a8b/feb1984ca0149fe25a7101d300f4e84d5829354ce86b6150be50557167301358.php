<?php

/* themes/omni-drupal-theme/omni-portfolio/drupal 8/theme/omni_portfolio/templates/field/field--block-content--field-showcase-slide.html.twig */
class __TwigTemplate_f3e15f7ce52d2b49dc39d0d9a48f21a349cc68a059ae1bdb1b19302bebb1b4e4 extends Twig_Template
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
        $tags = array("set" => 17, "for" => 19, "if" => 25);
        $filters = array("raw" => 34, "slice" => 40, "render" => 45);
        $functions = array("background_image" => 38);

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('set', 'for', 'if'),
                array('raw', 'slice', 'render'),
                array('background_image')
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
        $context["run"] = false;
        // line 18
        $context["type"] = "";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            if (((isset($context["run"]) ? $context["run"] : null) == false)) {
                // line 20
                echo "  ";
                $context["block"] = $this->getAttribute($this->getAttribute($context["item"], "content", array()), "#block_content", array(), "array");
                // line 21
                echo "  ";
                $context["type"] = $this->getAttribute($this->getAttribute((isset($context["block"]) ? $context["block"] : null), "field_showcase_type", array()), "value", array());
                // line 22
                echo "  ";
                $context["run"] = true;
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "
";
        // line 25
        if ((((isset($context["type"]) ? $context["type"] : null) == "main") || ((isset($context["type"]) ? $context["type"] : null) == "heading"))) {
            // line 26
            echo "  ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                echo "  
    ";
                // line 27
                $context["block"] = $this->getAttribute($this->getAttribute($context["item"], "content", array()), "#block_content", array(), "array");
                echo "   
    ";
                // line 28
                $context["url"] = $this->getAttribute($this->getAttribute((isset($context["block"]) ? $context["block"] : null), "field_link", array()), "uri", array());
                echo "    
    ";
                // line 29
                $context["pattern"] = $this->getAttribute($this->getAttribute((isset($context["block"]) ? $context["block"] : null), "field_showcase_pattern", array()), "value", array());
                echo "  
    ";
                // line 30
                $context["filter"] = $this->getAttribute($this->getAttribute((isset($context["block"]) ? $context["block"] : null), "field_background_filter", array()), "value", array());
                // line 31
                echo "    ";
                if ((isset($context["filter"]) ? $context["filter"] : null)) {
                    // line 32
                    echo "      ";
                    ob_start();
                    echo " with-filter ";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["filter"]) ? $context["filter"] : null), "html", null, true));
                    $context["filter"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 33
                    echo "    ";
                }
                // line 34
                echo "    ";
                ob_start();
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($this->getAttribute($this->getAttribute($context["item"], "content", array()), "field_background_image", array())));
                $context["image"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 35
                echo "
    <div>
      <div class=\"slide\"> 
        <div class=\"inner ";
                // line 38
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["pattern"]) ? $context["pattern"] : null), "html", null, true));
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["filter"]) ? $context["filter"] : null), "html", null, true));
                echo "\" style=\"";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($this->env->getExtension('omni')->background_image((isset($context["image"]) ? $context["image"] : null))));
                echo "\">
          <div class=\"wrapper\">
            ";
                // line 40
                if ((twig_slice($this->env, (isset($context["pattern"]) ? $context["pattern"] : null), 8, 1) == 1)) {
                    // line 41
                    echo "              <div class=\"slide-title element\">
                <h3>";
                    // line 42
                    if ((isset($context["url"]) ? $context["url"] : null)) {
                        echo "<a href=\"";
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true));
                        echo "\" target=\"_blank\">";
                    }
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($context["item"], "content", array()), "field_title", array()), "html", null, true));
                    if ((isset($context["url"]) ? $context["url"] : null)) {
                        echo "</a>";
                    }
                    echo "</h3>
              </div>
            ";
                }
                // line 45
                echo "            ";
                if ($this->env->getExtension('drupal_core')->renderVar($this->getAttribute($this->getAttribute($context["item"], "content", array()), "body", array()))) {
                    // line 46
                    echo "              <div class=\"slide-content element\">                   
                ";
                    // line 47
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($context["item"], "content", array()), "body", array()), "html", null, true));
                    echo "
              </div>
            ";
                }
                // line 50
                echo "          </div>
        </div> 
      </div>
    </div>
  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 56
        echo "
";
        // line 57
        if (((isset($context["type"]) ? $context["type"] : null) == "heading-alter")) {
            // line 58
            echo "  ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                echo "  
    ";
                // line 59
                $context["block"] = $this->getAttribute($this->getAttribute($context["item"], "content", array()), "#block_content", array(), "array");
                echo "   
    ";
                // line 60
                $context["url"] = $this->getAttribute($this->getAttribute((isset($context["block"]) ? $context["block"] : null), "field_link", array()), "uri", array());
                echo "    
    ";
                // line 61
                $context["pattern"] = $this->getAttribute($this->getAttribute((isset($context["block"]) ? $context["block"] : null), "field_showcase_pattern", array()), "value", array());
                echo "  
    ";
                // line 62
                $context["filter"] = $this->getAttribute($this->getAttribute((isset($context["block"]) ? $context["block"] : null), "field_background_filter", array()), "value", array());
                // line 63
                echo "    ";
                if ((isset($context["filter"]) ? $context["filter"] : null)) {
                    // line 64
                    echo "      ";
                    ob_start();
                    echo " with-filter ";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["filter"]) ? $context["filter"] : null), "html", null, true));
                    $context["filter"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 65
                    echo "    ";
                }
                // line 66
                echo "    ";
                ob_start();
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($this->getAttribute($this->getAttribute($context["item"], "content", array()), "field_background_image", array())));
                $context["image"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 67
                echo "
    <div>
      <div class=\"slide\"> 
        <div class=\"inner ";
                // line 70
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["pattern"]) ? $context["pattern"] : null), "html", null, true));
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["filter"]) ? $context["filter"] : null), "html", null, true));
                echo "\" style=\"";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($this->env->getExtension('omni')->background_image((isset($context["image"]) ? $context["image"] : null))));
                echo "\">
          ";
                // line 71
                if ((isset($context["url"]) ? $context["url"] : null)) {
                    // line 72
                    echo "            <a href=\"";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true));
                    echo "\" target=\"_blank\" class=\"cover\"></a>
          ";
                }
                // line 74
                echo "          <div class=\"content\">
            <div class=\"row\">
              <div class=\"large-9 large-centered text-center column\">
                ";
                // line 77
                if ($this->env->getExtension('drupal_core')->renderVar($this->getAttribute($this->getAttribute($context["item"], "content", array()), "field_category", array()))) {
                    // line 78
                    echo "                  <div class=\"slide-category\">
                  ";
                    // line 79
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($context["item"], "content", array()), "field_category", array()), "html", null, true));
                    echo "
                  </div>
                ";
                }
                // line 82
                echo "                <div class=\"slide-title element\">
                  <h3>";
                // line 83
                if ((isset($context["url"]) ? $context["url"] : null)) {
                    echo "<a href=\"";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true));
                    echo "\" target=\"_blank\">";
                }
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($context["item"], "content", array()), "field_title", array()), "html", null, true));
                if ((isset($context["url"]) ? $context["url"] : null)) {
                    echo "</a>";
                }
                echo "</h3>
                </div>
                ";
                // line 85
                if ($this->env->getExtension('drupal_core')->renderVar($this->getAttribute($this->getAttribute($context["item"], "content", array()), "body", array()))) {
                    // line 86
                    echo "                  <div class=\"slide-content element\">                   
                    ";
                    // line 87
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($context["item"], "content", array()), "body", array()), "html", null, true));
                    echo "
                  </div>
                ";
                }
                // line 90
                echo "              </div>
            </div>
          </div>
        </div> 
      </div>
    </div>
  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
    }

    public function getTemplateName()
    {
        return "themes/omni-drupal-theme/omni-portfolio/drupal 8/theme/omni_portfolio/templates/field/field--block-content--field-showcase-slide.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  270 => 90,  264 => 87,  261 => 86,  259 => 85,  246 => 83,  243 => 82,  237 => 79,  234 => 78,  232 => 77,  227 => 74,  221 => 72,  219 => 71,  212 => 70,  207 => 67,  202 => 66,  199 => 65,  193 => 64,  190 => 63,  188 => 62,  184 => 61,  180 => 60,  176 => 59,  169 => 58,  167 => 57,  164 => 56,  153 => 50,  147 => 47,  144 => 46,  141 => 45,  127 => 42,  124 => 41,  122 => 40,  114 => 38,  109 => 35,  104 => 34,  101 => 33,  95 => 32,  92 => 31,  90 => 30,  86 => 29,  82 => 28,  78 => 27,  71 => 26,  69 => 25,  66 => 24,  58 => 22,  55 => 21,  52 => 20,  47 => 19,  45 => 18,  43 => 17,);
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
/* {% set run = false %}*/
/* {% set type = '' %}*/
/* {% for item in items if run == false %}*/
/*   {% set block = item.content['#block_content'] %}*/
/*   {% set type = block.field_showcase_type.value %}*/
/*   {% set run = true %}*/
/* {% endfor %}*/
/* */
/* {% if type == 'main' or type == 'heading' %}*/
/*   {% for item in items %}  */
/*     {% set block = item.content['#block_content'] %}   */
/*     {% set url = block.field_link.uri %}    */
/*     {% set pattern = block.field_showcase_pattern.value %}  */
/*     {% set filter = block.field_background_filter.value %}*/
/*     {% if filter %}*/
/*       {% set filter %} with-filter {{ filter }}{% endset %}*/
/*     {% endif %}*/
/*     {% set image %}{{ item.content.field_background_image|raw }}{% endset %}*/
/* */
/*     <div>*/
/*       <div class="slide"> */
/*         <div class="inner {{ pattern }}{{ filter }}" style="{{ background_image(image)}}">*/
/*           <div class="wrapper">*/
/*             {% if pattern|slice(8,1) == 1 %}*/
/*               <div class="slide-title element">*/
/*                 <h3>{% if url %}<a href="{{ url }}" target="_blank">{% endif %}{{ item.content.field_title }}{% if url %}</a>{% endif %}</h3>*/
/*               </div>*/
/*             {% endif %}*/
/*             {% if item.content.body|render %}*/
/*               <div class="slide-content element">                   */
/*                 {{ item.content.body }}*/
/*               </div>*/
/*             {% endif %}*/
/*           </div>*/
/*         </div> */
/*       </div>*/
/*     </div>*/
/*   {% endfor %}*/
/* {% endif %}*/
/* */
/* {% if type == 'heading-alter' %}*/
/*   {% for item in items %}  */
/*     {% set block = item.content['#block_content'] %}   */
/*     {% set url = block.field_link.uri %}    */
/*     {% set pattern = block.field_showcase_pattern.value %}  */
/*     {% set filter = block.field_background_filter.value %}*/
/*     {% if filter %}*/
/*       {% set filter %} with-filter {{ filter }}{% endset %}*/
/*     {% endif %}*/
/*     {% set image %}{{ item.content.field_background_image|raw }}{% endset %}*/
/* */
/*     <div>*/
/*       <div class="slide"> */
/*         <div class="inner {{ pattern }}{{ filter }}" style="{{ background_image(image)}}">*/
/*           {% if url %}*/
/*             <a href="{{ url }}" target="_blank" class="cover"></a>*/
/*           {% endif %}*/
/*           <div class="content">*/
/*             <div class="row">*/
/*               <div class="large-9 large-centered text-center column">*/
/*                 {% if item.content.field_category|render %}*/
/*                   <div class="slide-category">*/
/*                   {{ item.content.field_category }}*/
/*                   </div>*/
/*                 {% endif %}*/
/*                 <div class="slide-title element">*/
/*                   <h3>{% if url %}<a href="{{ url }}" target="_blank">{% endif %}{{ item.content.field_title }}{% if url %}</a>{% endif %}</h3>*/
/*                 </div>*/
/*                 {% if item.content.body|render %}*/
/*                   <div class="slide-content element">                   */
/*                     {{ item.content.body }}*/
/*                   </div>*/
/*                 {% endif %}*/
/*               </div>*/
/*             </div>*/
/*           </div>*/
/*         </div> */
/*       </div>*/
/*     </div>*/
/*   {% endfor %}*/
/* {% endif %}*/
