<?php

/* block--macros.html.twig */
class __TwigTemplate_b7d5efac6a8ca1d67c0df04f2741583348a952193790bb074ac8c77b962eea52 extends Twig_Template
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
        $tags = array("macro" => 20, "set" => 21, "if" => 22);
        $filters = array("render" => 66, "raw" => 138);
        $functions = array("background_image" => 152);

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('macro', 'set', 'if'),
                array('render', 'raw'),
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
        echo "
";
        // line 51
        echo "
";
        // line 104
        echo "
";
        // line 120
        echo "
";
        // line 157
        echo "
";
        // line 174
        echo "
";
    }

    // line 20
    public function getblock_title($__block_content__ = null, $__title_prefix__ = null, $__title_suffix__ = null, $__mergin_type__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "block_content" => $__block_content__,
            "title_prefix" => $__title_prefix__,
            "title_suffix" => $__title_suffix__,
            "mergin_type" => $__mergin_type__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 21
            echo "  ";
            $context["title"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_title", array()), "value", array());
            // line 22
            echo "  ";
            if ((isset($context["title"]) ? $context["title"] : null)) {
                // line 23
                echo "    ";
                $context["subtitle"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_subtitle", array()), "value", array());
                // line 24
                echo "    ";
                $context["subtitle_position"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_subtitle_position", array()), "value", array());
                // line 25
                echo "    ";
                $context["title_align"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_title_align", array()), "value", array());
                // line 26
                echo "    ";
                $context["title_case"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_title_case", array()), "value", array());
                // line 27
                echo "    ";
                $context["title_border"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_title_border", array()), "value", array());
                // line 28
                echo "    ";
                $context["title_color"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_title_color", array()), "value", array());
                // line 29
                echo "    ";
                $context["title_size"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_title_size", array()), "value", array());
                // line 30
                echo "    ";
                $context["url"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_link", array()), "uri", array());
                // line 31
                echo "
    ";
                // line 32
                if ( !twig_test_empty((isset($context["title_color"]) ? $context["title_color"] : null))) {
                    echo " 
      ";
                    // line 33
                    ob_start();
                    echo "style=\"color:#";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title_color"]) ? $context["title_color"] : null), "html", null, true));
                    echo ";border-color:#";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title_color"]) ? $context["title_color"] : null), "html", null, true));
                    echo ";\"";
                    $context["style"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 34
                    echo "      ";
                    ob_start();
                    echo "style=\"color:#";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title_color"]) ? $context["title_color"] : null), "html", null, true));
                    echo ";\"";
                    $context["substyle"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 35
                    echo "    ";
                }
                echo " 
    
    ";
                // line 37
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title_prefix"]) ? $context["title_prefix"] : null), "html", null, true));
                echo "
    <div class=\"title";
                // line 38
                if (((isset($context["mergin_type"]) ? $context["mergin_type"] : null) == "horizontal")) {
                    echo " column row";
                }
                echo "\">
      ";
                // line 39
                if (((isset($context["subtitle"]) ? $context["subtitle"] : null) && ((isset($context["subtitle_position"]) ? $context["subtitle_position"] : null) == true))) {
                    // line 40
                    echo "        <div class=\"subtitle ";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title_align"]) ? $context["title_align"] : null), "html", null, true));
                    echo "\" ";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["substyle"]) ? $context["substyle"] : null), "html", null, true));
                    echo ">";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["subtitle"]) ? $context["subtitle"] : null), "html", null, true));
                    echo "</div>
      ";
                }
                // line 42
                echo "      <h3 class=\"";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title_size"]) ? $context["title_size"] : null), "html", null, true));
                echo " ";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title_align"]) ? $context["title_align"] : null), "html", null, true));
                if ((isset($context["title_case"]) ? $context["title_case"] : null)) {
                    echo " uppercase";
                }
                if ((isset($context["title_border"]) ? $context["title_border"] : null)) {
                    echo " with-border";
                }
                echo "\" ";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["style"]) ? $context["style"] : null), "html", null, true));
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title_attributes"]) ? $context["title_attributes"] : null), "html", null, true));
                echo ">";
                if ((isset($context["url"]) ? $context["url"] : null)) {
                    echo "<a href=\"";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true));
                    echo "\" target=\"_blank\">";
                }
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true));
                if ((isset($context["url"]) ? $context["url"] : null)) {
                    echo "</a>";
                }
                echo "</h3>
      ";
                // line 43
                if (((isset($context["subtitle"]) ? $context["subtitle"] : null) && ((isset($context["subtitle_position"]) ? $context["subtitle_position"] : null) == false))) {
                    // line 44
                    echo "        <div class=\"subtitle ";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title_align"]) ? $context["title_align"] : null), "html", null, true));
                    echo "\" ";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["substyle"]) ? $context["substyle"] : null), "html", null, true));
                    echo ">";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["subtitle"]) ? $context["subtitle"] : null), "html", null, true));
                    echo "</div>
      ";
                }
                // line 46
                echo "    </div>
    ";
                // line 47
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title_suffix"]) ? $context["title_suffix"] : null), "html", null, true));
                echo "

  ";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 54
    public function getblock_media($__block_content__ = null, $__content__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "block_content" => $__block_content__,
            "content" => $__content__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 55
            echo "
  ";
            // line 56
            $context["media_position_h"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_media_position_horizontal", array()), "value", array());
            // line 57
            echo "  ";
            $context["media_float"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_media_float", array()), "value", array());
            // line 58
            echo "  ";
            if ((isset($context["media_float"]) ? $context["media_float"] : null)) {
                // line 59
                echo "    ";
                ob_start();
                echo " float-";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["media_position_h"]) ? $context["media_position_h"] : null), "html", null, true));
                $context["position"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 60
                echo "  ";
            } else {
                // line 61
                echo "    ";
                $context["position"] = "";
                // line 62
                echo "  ";
            }
            // line 63
            echo "  ";
            $context["url"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_link", array()), "uri", array());
            // line 64
            echo "  ";
            $context["url_target"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_link_target_blank", array()), "value", array());
            // line 65
            echo "
  ";
            // line 66
            if ($this->env->getExtension('drupal_core')->renderVar($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_image", array()))) {
                // line 67
                echo "    ";
                $context["width"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_image_width", array()), "value", array());
                echo " 
    ";
                // line 68
                $context["padding"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_image_padding", array()), "value", array());
                echo "  
    ";
                // line 69
                $context["filter"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_image_filter", array()), "value", array());
                echo " 

    ";
                // line 71
                ob_start();
                echo "media-image";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["position"]) ? $context["position"] : null), "html", null, true));
                if ((isset($context["filter"]) ? $context["filter"] : null)) {
                    echo " with-filter ";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["filter"]) ? $context["filter"] : null), "html", null, true));
                }
                if (((isset($context["width"]) ? $context["width"] : null) == false)) {
                    echo " auto-width";
                }
                if (((isset($context["padding"]) ? $context["padding"] : null) == false)) {
                    echo " without-padding";
                }
                $context["class_setting"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 72
                echo "
    <div class=\"";
                // line 73
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["class_setting"]) ? $context["class_setting"] : null), "html", null, true));
                echo "\">
      ";
                // line 74
                if ((isset($context["url"]) ? $context["url"] : null)) {
                    // line 75
                    echo "        ";
                    if ((isset($context["filter"]) ? $context["filter"] : null)) {
                        // line 76
                        echo "          ";
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_image", array()), "html", null, true));
                        echo "
          <a href=\"";
                        // line 77
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true));
                        echo "\" class=\"cover\" ";
                        if ((isset($context["url_target"]) ? $context["url_target"] : null)) {
                            echo " target=\"_blank\"";
                        }
                        echo "></a>
        ";
                    } else {
                        // line 79
                        echo "          <a href=\"";
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true));
                        echo "\" ";
                        if ((isset($context["url_target"]) ? $context["url_target"] : null)) {
                            echo " target=\"_blank\"";
                        }
                        echo ">";
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_image", array()), "html", null, true));
                        echo "</a>
        ";
                    }
                    // line 81
                    echo "      ";
                } else {
                    // line 82
                    echo "        ";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_image", array()), "html", null, true));
                    echo "
      ";
                }
                // line 83
                echo "    
    </div> 
  ";
            }
            // line 86
            echo "  ";
            if ($this->env->getExtension('drupal_core')->renderVar($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_icon", array()))) {
                // line 87
                echo "    ";
                $context["icon"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_icon", array()), "value", array());
                // line 88
                echo "    ";
                $context["icon_color"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_icon_color", array()), "value", array());
                // line 89
                echo "    ";
                $context["icon_background_color"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_icon_background_color", array()), "value", array());
                // line 90
                echo "    ";
                $context["icon_border"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_icon_border", array()), "value", array());
                // line 91
                echo "    ";
                $context["icon_rounded"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_icon_rounded", array()), "value", array());
                // line 92
                echo "    ";
                $context["icon_size"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_icon_size", array()), "value", array());
                // line 93
                echo "
    ";
                // line 94
                if ((isset($context["icon_color"]) ? $context["icon_color"] : null)) {
                    echo " 
      ";
                    // line 95
                    $context["style"] = (("color:#" . (isset($context["icon_color"]) ? $context["icon_color"] : null)) . ";");
                    // line 96
                    echo "    ";
                }
                echo " 
    ";
                // line 97
                if ((isset($context["icon_background_color"]) ? $context["icon_background_color"] : null)) {
                    echo " 
      ";
                    // line 98
                    $context["style"] = ((((isset($context["style"]) ? $context["style"] : null) . "background-color:#") . (isset($context["icon_background_color"]) ? $context["icon_background_color"] : null)) . ";");
                    // line 99
                    echo "    ";
                }
                echo " 
    
    <div class=\"media-icon";
                // line 101
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (" " . (isset($context["icon_size"]) ? $context["icon_size"] : null)), "html", null, true));
                if ((isset($context["icon_rounded"]) ? $context["icon_rounded"] : null)) {
                    echo " rounded";
                }
                if ((isset($context["icon_border"]) ? $context["icon_border"] : null)) {
                    echo " with-border";
                }
                echo "\">";
                if ((isset($context["url"]) ? $context["url"] : null)) {
                    echo "<a href=\"";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true));
                    echo "\" target=\"_blank\">";
                }
                echo "<span class=\"";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["icon"]) ? $context["icon"] : null), "html", null, true));
                echo "\"";
                if ((isset($context["style"]) ? $context["style"] : null)) {
                    echo " style=\"";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["style"]) ? $context["style"] : null), "html", null, true));
                    echo "\"";
                }
                echo "></span>";
                if ((isset($context["url"]) ? $context["url"] : null)) {
                    echo "</a>";
                }
                echo "</div>    
  ";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 107
    public function getblock_body($__block_content__ = null, $__content__ = null, $__mergin_type__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "block_content" => $__block_content__,
            "content" => $__content__,
            "mergin_type" => $__mergin_type__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 108
            echo "  ";
            if (($this->env->getExtension('drupal_core')->renderVar($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "body", array())) || $this->env->getExtension('drupal_core')->renderVar($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_button", array())))) {
                // line 109
                echo "    <div class=\"content";
                if (((isset($context["mergin_type"]) ? $context["mergin_type"] : null) == "horizontal")) {
                    echo " column row";
                }
                echo " clearfix\">
      ";
                // line 110
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "body", array()), "html", null, true));
                echo "
      ";
                // line 111
                if ($this->env->getExtension('drupal_core')->renderVar($this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_button", array()))) {
                    // line 112
                    echo "        ";
                    $context["button_align"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_button_align", array()), "value", array());
                    // line 113
                    echo "        <div class=\"content-button ";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["button_align"]) ? $context["button_align"] : null), "html", null, true));
                    echo "\">
          ";
                    // line 114
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_button", array()), "html", null, true));
                    echo "
        </div>
      ";
                }
                // line 116
                echo " 
    </div>
  ";
            }
            // line 118
            echo " 
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 123
    public function getblock_style($__block_content__ = null, $__content__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "block_content" => $__block_content__,
            "content" => $__content__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 124
            echo "  ";
            $context["body_text_color"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_body_text_color", array()), "value", array());
            echo "  
  ";
            // line 125
            $context["background_color"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_background_color", array()), "value", array());
            // line 126
            echo "  ";
            $context["background_image"] = $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_background_image", array());
            // line 127
            echo "  ";
            $context["style"] = "";
            // line 128
            echo "
  ";
            // line 129
            if ((isset($context["body_text_color"]) ? $context["body_text_color"] : null)) {
                echo " 
    ";
                // line 130
                $context["style"] = (("color:#" . (isset($context["body_text_color"]) ? $context["body_text_color"] : null)) . ";");
                // line 131
                echo "  ";
            }
            echo " 

  ";
            // line 133
            if ((isset($context["background_color"]) ? $context["background_color"] : null)) {
                echo " 
    ";
                // line 134
                $context["style"] = ((((isset($context["style"]) ? $context["style"] : null) . "background-color:#") . (isset($context["background_color"]) ? $context["background_color"] : null)) . ";");
                // line 135
                echo "  ";
            }
            echo " 

  ";
            // line 137
            if ($this->env->getExtension('drupal_core')->renderVar((isset($context["background_image"]) ? $context["background_image"] : null))) {
                echo "     
    ";
                // line 138
                ob_start();
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar((isset($context["background_image"]) ? $context["background_image"] : null)));
                $context["image"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 139
                echo "    ";
                $context["background_size"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_background_size", array()), "value", array());
                // line 140
                echo "    ";
                $context["background_v_position"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_background_v_position", array()), "value", array());
                // line 141
                echo "    ";
                $context["background_h_position"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_background_h_position", array()), "value", array());
                // line 142
                echo "    ";
                $context["background_repeat"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_background_repeat", array()), "value", array());
                // line 143
                echo "
    ";
                // line 144
                if (((isset($context["background_size"]) ? $context["background_size"] : null) != "cover")) {
                    echo "       
      ";
                    // line 145
                    ob_start();
                    echo "background-position: ";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["background_v_position"]) ? $context["background_v_position"] : null), "html", null, true));
                    echo " ";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["background_h_position"]) ? $context["background_h_position"] : null), "html", null, true));
                    echo ";";
                    $context["position"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 146
                    echo "      ";
                    ob_start();
                    echo "background-repeat: ";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["background_repeat"]) ? $context["background_repeat"] : null), "html", null, true));
                    echo ";";
                    $context["repeat"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 147
                    echo "    ";
                }
                echo " 
    
    ";
                // line 149
                ob_start();
                echo "background-size: ";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["background_size"]) ? $context["background_size"] : null), "html", null, true));
                echo ";";
                $context["size"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 150
                echo "
    ";
                // line 151
                ob_start();
                echo " 
      ";
                // line 152
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["style"]) ? $context["style"] : null), "html", null, true));
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($this->env->getExtension('omni')->background_image((isset($context["image"]) ? $context["image"] : null))));
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["size"]) ? $context["size"] : null), "html", null, true));
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["position"]) ? $context["position"] : null), "html", null, true));
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["repeat"]) ? $context["repeat"] : null), "html", null, true));
                echo "
    ";
                $context["style"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 154
                echo "  ";
            }
            echo "  
  ";
            // line 155
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["style"]) ? $context["style"] : null), "html", null, true));
            echo "  
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 160
    public function getblock_reveal($__block_content__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "block_content" => $__block_content__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 161
            echo "  ";
            $context["reveal_origin"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_block_reveal_origin", array()), "value", array());
            // line 162
            echo "  ";
            $context["reveal_speed"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_block_reveal_speed", array()), "value", array());
            // line 163
            echo "  ";
            $context["reveal_delay"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_block_reveal_delay", array()), "value", array());
            // line 164
            echo "  ";
            $context["reveal_distance"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_block_reveal_distance", array()), "value", array());
            // line 165
            echo "  ";
            $context["reveal_reset"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_block_reveal_reset", array()), "value", array());
            // line 166
            echo "  ";
            if (((isset($context["reveal_reset"]) ? $context["reveal_reset"] : null) == true)) {
                // line 167
                echo "     ";
                $context["reveal_reset"] = " reveal-reset";
                // line 168
                echo "  ";
            } else {
                // line 169
                echo "     ";
                $context["reveal_reset"] = "";
                // line 170
                echo "  ";
            }
            // line 171
            echo "  ";
            ob_start();
            echo " block-reveal ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["reveal_origin"]) ? $context["reveal_origin"] : null), "html", null, true));
            echo " ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["reveal_speed"]) ? $context["reveal_speed"] : null), "html", null, true));
            echo " ";
            if ((isset($context["reveal_delay"]) ? $context["reveal_delay"] : null)) {
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["reveal_delay"]) ? $context["reveal_delay"] : null), "html", null, true));
                echo " ";
            }
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["reveal_distance"]) ? $context["reveal_distance"] : null), "html", null, true));
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["reveal_reset"]) ? $context["reveal_reset"] : null), "html", null, true));
            $context["reveal_setting"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 172
            echo "  ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["reveal_setting"]) ? $context["reveal_setting"] : null), "html", null, true));
            echo "  
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 177
    public function getblock_merging_class($__block_content__ = null, $__column_count__ = null, $__merging_even__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "block_content" => $__block_content__,
            "column_count" => $__column_count__,
            "merging_even" => $__merging_even__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 178
            echo "  ";
            $context["mergin_width"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_merging_width", array()), "value", array());
            echo "  
  ";
            // line 179
            $context["mergin_collapse"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_merging_collapse", array()), "value", array());
            // line 180
            echo "
  ";
            // line 181
            if (((isset($context["mergin_collapse"]) ? $context["mergin_collapse"] : null) == true)) {
                // line 182
                echo "    ";
                $context["collapes_setting"] = " collapse";
                // line 183
                echo "  ";
            } else {
                // line 184
                echo "    ";
                $context["collapes_setting"] = " uncollapse";
                // line 185
                echo "  ";
            }
            // line 186
            echo " 
  ";
            // line 187
            if (((((isset($context["merging_even"]) ? $context["merging_even"] : null) == true) || ((isset($context["column_count"]) ? $context["column_count"] : null) == 1)) || ((isset($context["column_count"]) ? $context["column_count"] : null) > 4))) {
                // line 188
                echo "    ";
                if (((isset($context["column_count"]) ? $context["column_count"] : null) == 1)) {
                    // line 189
                    echo "      ";
                    ob_start();
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["mergin_width"]) ? $context["mergin_width"] : null), "html", null, true));
                    echo " column row";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["collapes_setting"]) ? $context["collapes_setting"] : null), "html", null, true));
                    $context["merging_class"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 190
                    echo "    ";
                } elseif (((isset($context["column_count"]) ? $context["column_count"] : null) == 2)) {
                    // line 191
                    echo "      ";
                    ob_start();
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["mergin_width"]) ? $context["mergin_width"] : null), "html", null, true));
                    echo " row medium-up-1 large-up-2";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["collapes_setting"]) ? $context["collapes_setting"] : null), "html", null, true));
                    $context["merging_class"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 192
                    echo "    ";
                } elseif (((isset($context["column_count"]) ? $context["column_count"] : null) == 3)) {
                    // line 193
                    echo "      ";
                    ob_start();
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["mergin_width"]) ? $context["mergin_width"] : null), "html", null, true));
                    echo " row small-up-1 medium-up-2 large-up-3";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["collapes_setting"]) ? $context["collapes_setting"] : null), "html", null, true));
                    $context["merging_class"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 194
                    echo "    ";
                } elseif (((isset($context["column_count"]) ? $context["column_count"] : null) == 4)) {
                    // line 195
                    echo "      ";
                    ob_start();
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["mergin_width"]) ? $context["mergin_width"] : null), "html", null, true));
                    echo " row small-up-1 medium-up-2 large-up-4";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["collapes_setting"]) ? $context["collapes_setting"] : null), "html", null, true));
                    $context["merging_class"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 196
                    echo "    ";
                } elseif (((isset($context["column_count"]) ? $context["column_count"] : null) == 5)) {
                    // line 197
                    echo "      ";
                    ob_start();
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["mergin_width"]) ? $context["mergin_width"] : null), "html", null, true));
                    echo " row small-up-1 medium-up-3 large-up-5";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["collapes_setting"]) ? $context["collapes_setting"] : null), "html", null, true));
                    $context["merging_class"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 198
                    echo "    ";
                } elseif (((isset($context["column_count"]) ? $context["column_count"] : null) == 6)) {
                    // line 199
                    echo "      ";
                    ob_start();
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["mergin_width"]) ? $context["mergin_width"] : null), "html", null, true));
                    echo " row small-up-1 medium-up-2 large-up-3 xlarge-up-6";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["collapes_setting"]) ? $context["collapes_setting"] : null), "html", null, true));
                    $context["merging_class"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 200
                    echo "    ";
                } else {
                    // line 201
                    echo "    ";
                }
                echo " 
  ";
            } else {
                // line 203
                echo "    ";
                ob_start();
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["mergin_width"]) ? $context["mergin_width"] : null), "html", null, true));
                echo " row";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["collapes_setting"]) ? $context["collapes_setting"] : null), "html", null, true));
                $context["merging_class"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 204
                echo "  ";
            }
            echo " 
  ";
            // line 205
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["merging_class"]) ? $context["merging_class"] : null), "html", null, true));
            echo "
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "block--macros.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  827 => 205,  822 => 204,  815 => 203,  809 => 201,  806 => 200,  799 => 199,  796 => 198,  789 => 197,  786 => 196,  779 => 195,  776 => 194,  769 => 193,  766 => 192,  759 => 191,  756 => 190,  749 => 189,  746 => 188,  744 => 187,  741 => 186,  738 => 185,  735 => 184,  732 => 183,  729 => 182,  727 => 181,  724 => 180,  722 => 179,  717 => 178,  703 => 177,  689 => 172,  674 => 171,  671 => 170,  668 => 169,  665 => 168,  662 => 167,  659 => 166,  656 => 165,  653 => 164,  650 => 163,  647 => 162,  644 => 161,  632 => 160,  619 => 155,  614 => 154,  605 => 152,  601 => 151,  598 => 150,  592 => 149,  586 => 147,  579 => 146,  571 => 145,  567 => 144,  564 => 143,  561 => 142,  558 => 141,  555 => 140,  552 => 139,  548 => 138,  544 => 137,  538 => 135,  536 => 134,  532 => 133,  526 => 131,  524 => 130,  520 => 129,  517 => 128,  514 => 127,  511 => 126,  509 => 125,  504 => 124,  491 => 123,  479 => 118,  474 => 116,  468 => 114,  463 => 113,  460 => 112,  458 => 111,  454 => 110,  447 => 109,  444 => 108,  430 => 107,  392 => 101,  386 => 99,  384 => 98,  380 => 97,  375 => 96,  373 => 95,  369 => 94,  366 => 93,  363 => 92,  360 => 91,  357 => 90,  354 => 89,  351 => 88,  348 => 87,  345 => 86,  340 => 83,  334 => 82,  331 => 81,  319 => 79,  310 => 77,  305 => 76,  302 => 75,  300 => 74,  296 => 73,  293 => 72,  278 => 71,  273 => 69,  269 => 68,  264 => 67,  262 => 66,  259 => 65,  256 => 64,  253 => 63,  250 => 62,  247 => 61,  244 => 60,  238 => 59,  235 => 58,  232 => 57,  230 => 56,  227 => 55,  214 => 54,  199 => 47,  196 => 46,  186 => 44,  184 => 43,  158 => 42,  148 => 40,  146 => 39,  140 => 38,  136 => 37,  130 => 35,  123 => 34,  115 => 33,  111 => 32,  108 => 31,  105 => 30,  102 => 29,  99 => 28,  96 => 27,  93 => 26,  90 => 25,  87 => 24,  84 => 23,  81 => 22,  78 => 21,  63 => 20,  58 => 174,  55 => 157,  52 => 120,  49 => 104,  46 => 51,  43 => 17,);
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
/* */
/* {# PRINT TITLE   */
/* ----------------------------------------------------------------#}*/
/* {% macro block_title(block_content, title_prefix, title_suffix, mergin_type) %}*/
/*   {% set title = block_content.field_title.value %}*/
/*   {% if title %}*/
/*     {% set subtitle = block_content.field_subtitle.value %}*/
/*     {% set subtitle_position = block_content.field_subtitle_position.value %}*/
/*     {% set title_align = block_content.field_title_align.value %}*/
/*     {% set title_case = block_content.field_title_case.value %}*/
/*     {% set title_border = block_content.field_title_border.value %}*/
/*     {% set title_color = block_content.field_title_color.value %}*/
/*     {% set title_size = block_content.field_title_size.value %}*/
/*     {% set url = block_content.field_link.uri %}*/
/* */
/*     {% if title_color is not empty %} */
/*       {% set style %}style="color:#{{title_color}};border-color:#{{title_color}};"{% endset %}*/
/*       {% set substyle %}style="color:#{{title_color}};"{% endset %}*/
/*     {% endif %} */
/*     */
/*     {{ title_prefix }}*/
/*     <div class="title{% if mergin_type=='horizontal' %} column row{% endif %}">*/
/*       {% if subtitle and subtitle_position == true %}*/
/*         <div class="subtitle {{ title_align }}" {{ substyle }}>{{ subtitle }}</div>*/
/*       {% endif %}*/
/*       <h3 class="{{ title_size }} {{ title_align }}{% if title_case %} uppercase{% endif %}{% if title_border %} with-border{% endif %}" {{ style }}{{ title_attributes }}>{% if url %}<a href="{{ url }}" target="_blank">{% endif %}{{ title }}{% if url %}</a>{% endif %}</h3>*/
/*       {% if subtitle and subtitle_position == false %}*/
/*         <div class="subtitle {{ title_align }}" {{ substyle }}>{{ subtitle }}</div>*/
/*       {% endif %}*/
/*     </div>*/
/*     {{ title_suffix }}*/
/* */
/*   {% endif %}*/
/* {% endmacro %}*/
/* */
/* {# PRINT MEDIA  */
/* ----------------------------------------------------------------#}*/
/* {% macro block_media(block_content, content) %}*/
/* */
/*   {% set media_position_h = block_content.field_media_position_horizontal.value %}*/
/*   {% set media_float = block_content.field_media_float.value %}*/
/*   {% if media_float %}*/
/*     {% set position %} float-{{media_position_h}}{% endset %}*/
/*   {% else %}*/
/*     {% set position = '' %}*/
/*   {% endif %}*/
/*   {% set url = block_content.field_link.uri %}*/
/*   {% set url_target = block_content.field_link_target_blank.value %}*/
/* */
/*   {% if content.field_image|render %}*/
/*     {% set width = block_content.field_image_width.value %} */
/*     {% set padding = block_content.field_image_padding.value %}  */
/*     {% set filter = block_content.field_image_filter.value %} */
/* */
/*     {% set class_setting %}media-image{{position}}{% if filter %} with-filter {{ filter }}{% endif %}{% if width == false %} auto-width{% endif %}{% if padding == false %} without-padding{% endif %}{% endset %}*/
/* */
/*     <div class="{{ class_setting }}">*/
/*       {% if url %}*/
/*         {% if filter %}*/
/*           {{ content.field_image }}*/
/*           <a href="{{ url }}" class="cover" {% if url_target %} target="_blank"{% endif %}></a>*/
/*         {% else %}*/
/*           <a href="{{ url }}" {% if url_target %} target="_blank"{% endif %}>{{ content.field_image }}</a>*/
/*         {% endif %}*/
/*       {% else %}*/
/*         {{ content.field_image }}*/
/*       {% endif %}    */
/*     </div> */
/*   {% endif %}*/
/*   {% if content.field_icon|render %}*/
/*     {% set icon = block_content.field_icon.value %}*/
/*     {% set icon_color = block_content.field_icon_color.value %}*/
/*     {% set icon_background_color = block_content.field_icon_background_color.value %}*/
/*     {% set icon_border = block_content.field_icon_border.value %}*/
/*     {% set icon_rounded = block_content.field_icon_rounded.value %}*/
/*     {% set icon_size = block_content.field_icon_size.value %}*/
/* */
/*     {% if icon_color %} */
/*       {% set style = 'color:#' ~ icon_color ~ ';' %}*/
/*     {% endif %} */
/*     {% if icon_background_color %} */
/*       {% set style = style~'background-color:#' ~ icon_background_color ~ ';' %}*/
/*     {% endif %} */
/*     */
/*     <div class="media-icon{{ ' '~icon_size }}{% if icon_rounded %} rounded{% endif %}{% if icon_border %} with-border{% endif %}">{% if url %}<a href="{{ url }}" target="_blank">{% endif %}<span class="{{ icon }}"{% if style %} style="{{ style }}"{% endif %}></span>{% if url %}</a>{% endif %}</div>    */
/*   {% endif %}*/
/* {% endmacro %}*/
/* */
/* {# PRINT BODY  */
/* ----------------------------------------------------------------#}*/
/* {% macro block_body(block_content, content, mergin_type) %}*/
/*   {% if content.body|render or content.field_button|render %}*/
/*     <div class="content{% if mergin_type=='horizontal' %} column row{% endif %} clearfix">*/
/*       {{ content.body }}*/
/*       {% if content.field_button|render %}*/
/*         {% set button_align = block_content.field_button_align.value %}*/
/*         <div class="content-button {{ button_align }}">*/
/*           {{ content.field_button }}*/
/*         </div>*/
/*       {% endif %} */
/*     </div>*/
/*   {% endif %} */
/* {% endmacro %}*/
/* */
/* {# PRINT BACKGROUND   */
/* ----------------------------------------------------------------#}*/
/* {% macro block_style(block_content, content) %}*/
/*   {% set body_text_color = block_content.field_body_text_color.value %}  */
/*   {% set background_color = block_content.field_background_color.value %}*/
/*   {% set background_image = content.field_background_image %}*/
/*   {% set style = '' %}*/
/* */
/*   {% if body_text_color %} */
/*     {% set style = 'color:#' ~ body_text_color ~ ';' %}*/
/*   {% endif %} */
/* */
/*   {% if background_color %} */
/*     {% set style = style~'background-color:#' ~ background_color ~ ';' %}*/
/*   {% endif %} */
/* */
/*   {% if background_image|render %}     */
/*     {% set image %}{{ background_image|raw }}{% endset %}*/
/*     {% set background_size = block_content.field_background_size.value %}*/
/*     {% set background_v_position = block_content.field_background_v_position.value %}*/
/*     {% set background_h_position = block_content.field_background_h_position.value %}*/
/*     {% set background_repeat = block_content.field_background_repeat.value %}*/
/* */
/*     {% if background_size != 'cover' %}       */
/*       {% set position %}background-position: {{background_v_position}} {{background_h_position}};{% endset %}*/
/*       {% set repeat %}background-repeat: {{background_repeat}};{% endset %}*/
/*     {% endif %} */
/*     */
/*     {% set size %}background-size: {{background_size}};{% endset %}*/
/* */
/*     {% set style %} */
/*       {{style}}{{ background_image(image) }}{{size}}{{position}}{{repeat}}*/
/*     {% endset %}*/
/*   {% endif %}  */
/*   {{ style }}  */
/* {% endmacro %}*/
/* */
/* {# PRINT REVEAL   */
/* ----------------------------------------------------------------#}*/
/* {% macro block_reveal(block_content) %}*/
/*   {% set reveal_origin = block_content.field_block_reveal_origin.value %}*/
/*   {% set reveal_speed = block_content.field_block_reveal_speed.value %}*/
/*   {% set reveal_delay = block_content.field_block_reveal_delay.value %}*/
/*   {% set reveal_distance = block_content.field_block_reveal_distance.value %}*/
/*   {% set reveal_reset = block_content.field_block_reveal_reset.value %}*/
/*   {% if reveal_reset == true %}*/
/*      {% set reveal_reset = ' reveal-reset' %}*/
/*   {% else %}*/
/*      {% set reveal_reset = '' %}*/
/*   {% endif %}*/
/*   {% set reveal_setting %} block-reveal {{reveal_origin}} {{reveal_speed}} {% if reveal_delay %}{{reveal_delay}} {% endif %}{{reveal_distance}}{{reveal_reset}}{% endset %}*/
/*   {{ reveal_setting }}  */
/* {% endmacro %}*/
/* */
/* {# PRINT MERGING CLASS   */
/* ----------------------------------------------------------------#}*/
/* {% macro block_merging_class(block_content, column_count, merging_even) %}*/
/*   {% set mergin_width = block_content.field_merging_width.value %}  */
/*   {% set mergin_collapse = block_content.field_merging_collapse.value %}*/
/* */
/*   {% if mergin_collapse == true %}*/
/*     {% set collapes_setting = ' collapse' %}*/
/*   {% else %}*/
/*     {% set collapes_setting = ' uncollapse' %}*/
/*   {% endif %}*/
/*  */
/*   {% if merging_even == true or column_count == 1 or column_count > 4 %}*/
/*     {% if column_count == 1 %}*/
/*       {% set merging_class %}{{ mergin_width }} column row{{ collapes_setting }}{% endset %}*/
/*     {% elseif column_count == 2 %}*/
/*       {% set merging_class %}{{ mergin_width }} row medium-up-1 large-up-2{{ collapes_setting }}{% endset %}*/
/*     {% elseif column_count == 3 %}*/
/*       {% set merging_class %}{{ mergin_width }} row small-up-1 medium-up-2 large-up-3{{ collapes_setting }}{% endset %}*/
/*     {% elseif column_count == 4 %}*/
/*       {% set merging_class %}{{ mergin_width }} row small-up-1 medium-up-2 large-up-4{{ collapes_setting }}{% endset %}*/
/*     {% elseif column_count == 5 %}*/
/*       {% set merging_class %}{{ mergin_width }} row small-up-1 medium-up-3 large-up-5{{ collapes_setting }}{% endset %}*/
/*     {% elseif column_count == 6 %}*/
/*       {% set merging_class %}{{ mergin_width }} row small-up-1 medium-up-2 large-up-3 xlarge-up-6{{ collapes_setting }}{% endset %}*/
/*     {% else %}*/
/*     {% endif %} */
/*   {% else %}*/
/*     {% set merging_class %}{{ mergin_width }} row{{ collapes_setting }}{% endset %}*/
/*   {% endif %} */
/*   {{ merging_class }}*/
/* {% endmacro %}*/
