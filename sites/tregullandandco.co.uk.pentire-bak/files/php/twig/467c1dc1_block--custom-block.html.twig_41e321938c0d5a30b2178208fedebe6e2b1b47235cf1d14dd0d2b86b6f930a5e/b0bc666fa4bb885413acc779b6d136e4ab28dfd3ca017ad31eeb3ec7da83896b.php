<?php

/* themes/omni-drupal-theme/omni-portfolio/drupal 8/theme/omni_portfolio/templates/block/block--custom-block.html.twig */
class __TwigTemplate_22a877904b446be60b9f5c77fab152f2c62fa575ec30f7a4c148dd5817f140d4 extends Twig_Template
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
        $tags = array("import" => 18, "set" => 22, "spaceless" => 26, "if" => 29, "for" => 57);
        $filters = array("render" => 58);
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('import', 'set', 'spaceless', 'if', 'for'),
                array('render'),
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

        // line 16
        echo " 

";
        // line 18
        $context["block_macro"] = $this->loadTemplate("block--macros.html.twig", "themes/omni-drupal-theme/omni-portfolio/drupal 8/theme/omni_portfolio/templates/block/block--custom-block.html.twig", 18);
        // line 19
        echo "
";
        // line 22
        $context["pattern"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_block_pattern", array()), "value", array());
        // line 23
        $context["reveal"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_block_reveal", array()), "value", array());
        echo " 
";
        // line 24
        $context["padding"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_block_padding", array()), "value", array());
        // line 25
        $context["margin"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_block_margin", array()), "value", array());
        // line 26
        ob_start();
        ob_start();
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_style((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["content"]) ? $context["content"] : null))));
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        $context["style"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 27
        $context["equal_height"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_merging_col_height", array()), "value", array());
        echo "  

";
        // line 29
        if ((isset($context["reveal"]) ? $context["reveal"] : null)) {
            echo "    
  ";
            // line 30
            ob_start();
            echo " ";
            ob_start();
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_reveal((isset($context["block_content"]) ? $context["block_content"] : null))));
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            $context["reveal_setting"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        }
        // line 32
        if (((isset($context["padding"]) ? $context["padding"] : null) == true)) {
            // line 33
            echo "  ";
            $context["padding_setting"] = " with-padding";
            echo "  
";
        } else {
            // line 35
            echo "  ";
            $context["padding_setting"] = " without-padding";
        }
        // line 37
        if (((isset($context["margin"]) ? $context["margin"] : null) == true)) {
            // line 38
            echo "  ";
            $context["margin_setting"] = " with-margin";
        }
        // line 40
        if ((isset($context["style"]) ? $context["style"] : null)) {
            echo "    
  ";
            // line 41
            ob_start();
            echo " style=\"";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["style"]) ? $context["style"] : null), "html", null, true));
            echo "\"";
            $context["style_setting"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        }
        // line 43
        echo "
";
        // line 44
        if ( !twig_test_empty($this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_merging_type", array()), "value", array()))) {
            // line 45
            echo "
  ";
            // line 48
            $context["mergin_type"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_merging_type", array()), "value", array());
            echo " 

  ";
            // line 50
            if (((isset($context["mergin_type"]) ? $context["mergin_type"] : null) == "horizontal")) {
                echo "    
    ";
                // line 51
                $context["merging_even"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_merging_col_width", array()), "value", array());
                // line 52
                echo "    ";
                $context["merging_collapse"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_merging_collapse", array()), "value", array());
                // line 53
                echo "    ";
                $context["filter"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_background_filter", array()), "value", array());
                // line 54
                echo "    ";
                ob_start();
                echo " ";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["pattern"]) ? $context["pattern"] : null), "html", null, true));
                if ((isset($context["filter"]) ? $context["filter"] : null)) {
                    echo " with-filter ";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["filter"]) ? $context["filter"] : null), "html", null, true));
                }
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["padding_setting"]) ? $context["padding_setting"] : null), "html", null, true));
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["margin_setting"]) ? $context["margin_setting"] : null), "html", null, true));
                if (((isset($context["merging_collapse"]) ? $context["merging_collapse"] : null) == false)) {
                    echo " without-collapse";
                }
                $context["class_setting"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 55
                echo "    
    ";
                // line 56
                $context["column_count"] = 0;
                // line 57
                echo "    ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(1, 6));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 58
                    echo "      ";
                    if ($this->env->getExtension('drupal_core')->renderVar($this->getAttribute((isset($context["content"]) ? $context["content"] : null), ("field_merging_col_" . $context["i"]), array(), "array"))) {
                        // line 59
                        echo "        ";
                        $context["column_count"] = ((isset($context["column_count"]) ? $context["column_count"] : null) + 1);
                        // line 60
                        echo "      ";
                    }
                    // line 61
                    echo "    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 62
                echo "    ";
                ob_start();
                ob_start();
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_merging_class((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["column_count"]) ? $context["column_count"] : null), (isset($context["merging_even"]) ? $context["merging_even"] : null))));
                echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                $context["merging_setting"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 63
                echo "
    <div id=\"";
                // line 64
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "id", array()), "html", null, true));
                echo "\" class=\"block block-custom block-merging merging-horizontal";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["reveal_setting"]) ? $context["reveal_setting"] : null), "html", null, true));
                echo " ";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "class", array()), "html", null, true));
                echo "\">
      <div class=\"inner";
                // line 65
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["class_setting"]) ? $context["class_setting"] : null), "html", null, true));
                echo "\"";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["style_setting"]) ? $context["style_setting"] : null), "html", null, true));
                echo ">
        ";
                // line 66
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_title((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["title_prefix"]) ? $context["title_prefix"] : null), (isset($context["title_suffix"]) ? $context["title_suffix"] : null), (isset($context["mergin_type"]) ? $context["mergin_type"] : null))));
                echo "
        ";
                // line 67
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_body((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["content"]) ? $context["content"] : null), (isset($context["mergin_type"]) ? $context["mergin_type"] : null))));
                echo "
        
        <div class=\"";
                // line 69
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["merging_setting"]) ? $context["merging_setting"] : null), "html", null, true));
                echo "\"";
                if ((isset($context["equal_height"]) ? $context["equal_height"] : null)) {
                    echo " data-equalizer";
                }
                echo ">        
          ";
                // line 70
                if (((((isset($context["merging_even"]) ? $context["merging_even"] : null) == true) || ((isset($context["column_count"]) ? $context["column_count"] : null) == 1)) || ((isset($context["column_count"]) ? $context["column_count"] : null) > 4))) {
                    echo "          
            ";
                    // line 71
                    if (((isset($context["column_count"]) ? $context["column_count"] : null) == 1)) {
                        // line 72
                        echo "              ";
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_merging_col_1", array(), "array"), "html", null, true));
                        echo "
            ";
                    } else {
                        // line 74
                        echo "              ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(range(1, 6));
                        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                            // line 75
                            echo "                ";
                            if ($this->env->getExtension('drupal_core')->renderVar($this->getAttribute((isset($context["content"]) ? $context["content"] : null), ("field_merging_col_" . $context["i"]), array(), "array"))) {
                                // line 76
                                echo "                  <div class=\"column\">
                    ";
                                // line 77
                                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), ("field_merging_col_" . $context["i"]), array(), "array"), "html", null, true));
                                echo "
                  </div>
                ";
                            }
                            // line 80
                            echo "              ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        echo " 
            ";
                    }
                    // line 81
                    echo "      
          ";
                } else {
                    // line 82
                    echo "          
            ";
                    // line 83
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(range(1, 4));
                    foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                        // line 84
                        echo "              ";
                        if ($this->env->getExtension('drupal_core')->renderVar($this->getAttribute((isset($context["content"]) ? $context["content"] : null), ("field_merging_col_" . $context["i"]), array(), "array"))) {
                            // line 85
                            echo "                ";
                            if ($this->env->getExtension('drupal_core')->renderVar($this->getAttribute((isset($context["content"]) ? $context["content"] : null), ("field_merging_col_size_m_" . $context["i"]), array(), "array"))) {
                                // line 86
                                echo "                  <div class=\"";
                                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), ("field_merging_col_size_m_" . $context["i"]), array(), "array"), "html", null, true));
                                echo " ";
                                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), ("field_merging_col_size_l_" . $context["i"]), array(), "array"), "html", null, true));
                                echo " column\">
                    ";
                                // line 87
                                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), ("field_merging_col_" . $context["i"]), array(), "array"), "html", null, true));
                                echo "
                  </div>
                ";
                            } else {
                                // line 90
                                echo "                  ";
                                if ((((isset($context["column_count"]) ? $context["column_count"] : null) == 3) && ($context["i"] == 3))) {
                                    // line 91
                                    echo "                    <div class=\"";
                                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), ("field_merging_col_size_l_" . $context["i"]), array(), "array"), "html", null, true));
                                    echo " column\">
                      ";
                                    // line 92
                                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), ("field_merging_col_" . $context["i"]), array(), "array"), "html", null, true));
                                    echo "
                    </div>
                  ";
                                } else {
                                    // line 95
                                    echo "                    <div class=\"medium-6 ";
                                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), ("field_merging_col_size_l_" . $context["i"]), array(), "array"), "html", null, true));
                                    echo " column\">
                      ";
                                    // line 96
                                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), ("field_merging_col_" . $context["i"]), array(), "array"), "html", null, true));
                                    echo "
                    </div>
                  ";
                                }
                                // line 99
                                echo "                ";
                            }
                            // line 100
                            echo "              ";
                        }
                        // line 101
                        echo "            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    echo "  
          ";
                }
                // line 103
                echo "        </div>
      </div>
    </div>
  ";
            } elseif ((            // line 106
(isset($context["mergin_type"]) ? $context["mergin_type"] : null) == "tab")) {
                // line 107
                echo "    ";
                $context["mergin_width"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_merging_width", array()), "value", array());
                echo " 
    ";
                // line 108
                $context["filter"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_background_filter", array()), "value", array());
                // line 109
                echo "    ";
                ob_start();
                if ((isset($context["filter"]) ? $context["filter"] : null)) {
                    echo " with-filter ";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["filter"]) ? $context["filter"] : null), "html", null, true));
                }
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["padding_setting"]) ? $context["padding_setting"] : null), "html", null, true));
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["margin_setting"]) ? $context["margin_setting"] : null), "html", null, true));
                $context["class_setting"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 110
                echo "    <div id=\"";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "id", array()), "html", null, true));
                echo "\" class=\"block block-custom block-merging merging-tab";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["reveal_setting"]) ? $context["reveal_setting"] : null), "html", null, true));
                echo "\">         
      <div class=\"inner";
                // line 111
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["class_setting"]) ? $context["class_setting"] : null), "html", null, true));
                echo "\"";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["style_setting"]) ? $context["style_setting"] : null), "html", null, true));
                echo ">
        <div class=\"";
                // line 112
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["mergin_width"]) ? $context["mergin_width"] : null), "html", null, true));
                echo " row collapse\">
          ";
                // line 113
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_merging_tab", array()), "html", null, true));
                echo "
        </div>
      </div>
    </div>
  ";
            } else {
                // line 117
                echo " 
    ";
                // line 118
                ob_start();
                echo " ";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["padding_setting"]) ? $context["padding_setting"] : null), "html", null, true));
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["margin_setting"]) ? $context["margin_setting"] : null), "html", null, true));
                $context["class_setting"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 119
                echo "    <div id=\"";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "id", array()), "html", null, true));
                echo "\" class=\"block block-custom block-merging merging-slider";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["reveal_setting"]) ? $context["reveal_setting"] : null), "html", null, true));
                echo "\">         
      <div class=\"inner";
                // line 120
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["class_setting"]) ? $context["class_setting"] : null), "html", null, true));
                echo "\"";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["style_setting"]) ? $context["style_setting"] : null), "html", null, true));
                echo ">
        ";
                // line 121
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_title((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["title_prefix"]) ? $context["title_prefix"] : null), (isset($context["title_suffix"]) ? $context["title_suffix"] : null), (isset($context["mergin_type"]) ? $context["mergin_type"] : null))));
                echo "
        ";
                // line 122
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_body((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["content"]) ? $context["content"] : null), (isset($context["mergin_type"]) ? $context["mergin_type"] : null))));
                echo "
        <div class=\"showcase showcase-merging\">          
          ";
                // line 124
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_merging_slider", array()), "html", null, true));
                echo "          
        </div>
      </div>
    </div>
  ";
            }
            // line 129
            echo "
";
        } else {
            // line 131
            echo "
  ";
            // line 134
            $context["display"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_block_display", array()), "value", array());
            // line 135
            echo "  ";
            $context["mergin_width"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_merging_width", array()), "value", array());
            echo " 
  ";
            // line 136
            $context["media_position_h"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_media_position_horizontal", array()), "value", array());
            // line 137
            echo "  ";
            $context["media_position_v"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_media_position_vertical", array()), "value", array());
            // line 138
            echo "  ";
            $context["media_float"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_media_float", array()), "value", array());
            // line 139
            echo "  ";
            $context["filter"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_background_filter", array()), "value", array());
            // line 140
            echo "  ";
            $context["url"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_link", array()), "uri", array());
            echo "  
  ";
            // line 141
            $context["url_target"] = $this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_link_target_blank", array()), "value", array());
            // line 142
            echo "  ";
            ob_start();
            echo " ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["display"]) ? $context["display"] : null), "html", null, true));
            echo " ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["pattern"]) ? $context["pattern"] : null), "html", null, true));
            if ((isset($context["filter"]) ? $context["filter"] : null)) {
                echo " with-filter ";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["filter"]) ? $context["filter"] : null), "html", null, true));
            }
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["padding_setting"]) ? $context["padding_setting"] : null), "html", null, true));
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["margin_setting"]) ? $context["margin_setting"] : null), "html", null, true));
            $context["class_setting"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 143
            echo "  
  ";
            // line 144
            if ( !twig_test_empty($this->getAttribute($this->getAttribute((isset($context["block_content"]) ? $context["block_content"] : null), "field_block_attachment", array()), "value", array()))) {
                // line 145
                echo "    ";
                $context["attachment"] = true;
                // line 146
                echo "  ";
            } else {
                // line 147
                echo "    ";
                $context["attachment"] = false;
                // line 148
                echo "  ";
            }
            // line 149
            echo "
  <div id=\"";
            // line 150
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "id", array()), "html", null, true));
            echo "\" class=\"block block-custom";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["reveal_setting"]) ? $context["reveal_setting"] : null), "html", null, true));
            echo " ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "class", array()), "html", null, true));
            echo "\">        
    <div class=\"inner";
            // line 151
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["class_setting"]) ? $context["class_setting"] : null), "html", null, true));
            echo "\"";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["style_setting"]) ? $context["style_setting"] : null), "html", null, true));
            if ((isset($context["equal_height"]) ? $context["equal_height"] : null)) {
                echo " data-equalizer-watch";
            }
            echo "> 
      ";
            // line 152
            if (((isset($context["mergin_width"]) ? $context["mergin_width"] : null) == "unexpended")) {
                // line 153
                echo "        <div class=\"column row\">
      ";
            }
            // line 155
            echo "
      ";
            // line 156
            if (((isset($context["display"]) ? $context["display"] : null) == "display-1")) {
                // line 157
                echo "
        ";
                // line 158
                if ((((isset($context["media_position_h"]) ? $context["media_position_h"] : null) == "default") || (((isset($context["media_position_h"]) ? $context["media_position_h"] : null) != "default") && ((isset($context["media_float"]) ? $context["media_float"] : null) == true)))) {
                    // line 159
                    echo "          ";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_title((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["title_prefix"]) ? $context["title_prefix"] : null), (isset($context["title_suffix"]) ? $context["title_suffix"] : null))));
                    echo "          
          ";
                    // line 160
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_media((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["content"]) ? $context["content"] : null))));
                    echo "  
          ";
                    // line 161
                    if ((isset($context["attachment"]) ? $context["attachment"] : null)) {
                        echo "       
            ";
                        // line 162
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_block_attachment", array()), "html", null, true));
                        echo "             
          ";
                    } else {
                        // line 164
                        echo "            ";
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_body((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["content"]) ? $context["content"] : null))));
                        echo "
          ";
                    }
                    // line 166
                    echo "        ";
                }
                // line 167
                echo "        ";
                if ((((isset($context["media_position_h"]) ? $context["media_position_h"] : null) == "left") && ((isset($context["media_float"]) ? $context["media_float"] : null) == false))) {
                    // line 168
                    echo "          ";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_title((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["title_prefix"]) ? $context["title_prefix"] : null), (isset($context["title_suffix"]) ? $context["title_suffix"] : null))));
                    echo "
          <div class=\"media-object stack-for-small\">
            <div class=\"media-object-section ";
                    // line 170
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["media_position_v"]) ? $context["media_position_v"] : null), "html", null, true));
                    echo "\">
              ";
                    // line 171
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_media((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["content"]) ? $context["content"] : null))));
                    echo "              
            </div>
            <div class=\"media-object-section section-content\">
              ";
                    // line 174
                    if ((isset($context["attachment"]) ? $context["attachment"] : null)) {
                        echo "       
                ";
                        // line 175
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_block_attachment", array()), "html", null, true));
                        echo "             
              ";
                    } else {
                        // line 177
                        echo "                ";
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_body((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["content"]) ? $context["content"] : null))));
                        echo "
              ";
                    }
                    // line 179
                    echo "            </div>
          </div>
        ";
                }
                // line 181
                echo "  
        ";
                // line 182
                if ((((isset($context["media_position_h"]) ? $context["media_position_h"] : null) == "right") && ((isset($context["media_float"]) ? $context["media_float"] : null) == false))) {
                    // line 183
                    echo "          ";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_title((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["title_prefix"]) ? $context["title_prefix"] : null), (isset($context["title_suffix"]) ? $context["title_suffix"] : null))));
                    echo "
          <div class=\"media-object stack-for-small\">
            <div class=\"media-object-section section-content\">
              ";
                    // line 186
                    if ((isset($context["attachment"]) ? $context["attachment"] : null)) {
                        echo "       
                ";
                        // line 187
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_block_attachment", array()), "html", null, true));
                        echo "             
              ";
                    } else {
                        // line 189
                        echo "                ";
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_body((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["content"]) ? $context["content"] : null))));
                        echo "
              ";
                    }
                    // line 191
                    echo "            </div>
            <div class=\"media-object-section ";
                    // line 192
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["media_position_v"]) ? $context["media_position_v"] : null), "html", null, true));
                    echo "\">
              ";
                    // line 193
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_media((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["content"]) ? $context["content"] : null))));
                    echo "              
            </div>
          </div>
        ";
                }
                // line 196
                echo "    

      ";
            } elseif ((            // line 198
(isset($context["display"]) ? $context["display"] : null) == "display-2")) {
                // line 199
                echo "
        ";
                // line 200
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_title((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["title_prefix"]) ? $context["title_prefix"] : null), (isset($context["title_suffix"]) ? $context["title_suffix"] : null))));
                echo "
        ";
                // line 201
                if ((isset($context["attachment"]) ? $context["attachment"] : null)) {
                    echo "       
          ";
                    // line 202
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_block_attachment", array()), "html", null, true));
                    echo "             
        ";
                } else {
                    // line 204
                    echo "          ";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_body((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["content"]) ? $context["content"] : null))));
                    echo "
        ";
                }
                // line 206
                echo "        ";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_media((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["content"]) ? $context["content"] : null))));
                echo "

      ";
            } elseif ((            // line 208
(isset($context["display"]) ? $context["display"] : null) == "display-3")) {
                // line 209
                echo "
        ";
                // line 210
                if ((((isset($context["media_position_h"]) ? $context["media_position_h"] : null) == "default") || (((isset($context["media_position_h"]) ? $context["media_position_h"] : null) != "default") && ((isset($context["media_float"]) ? $context["media_float"] : null) == true)))) {
                    // line 211
                    echo "          ";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_media((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["content"]) ? $context["content"] : null))));
                    echo "
          ";
                    // line 212
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_title((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["title_prefix"]) ? $context["title_prefix"] : null), (isset($context["title_suffix"]) ? $context["title_suffix"] : null))));
                    echo "                    
          ";
                    // line 213
                    if ((isset($context["attachment"]) ? $context["attachment"] : null)) {
                        echo "       
            ";
                        // line 214
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_block_attachment", array()), "html", null, true));
                        echo "             
          ";
                    } else {
                        // line 216
                        echo "            ";
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_body((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["content"]) ? $context["content"] : null))));
                        echo "
          ";
                    }
                    // line 218
                    echo "        ";
                }
                // line 219
                echo "        ";
                if ((((isset($context["media_position_h"]) ? $context["media_position_h"] : null) == "left") && ((isset($context["media_float"]) ? $context["media_float"] : null) == false))) {
                    echo "         
          <div class=\"media-object stack-for-small\">
            <div class=\"media-object-section ";
                    // line 221
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["media_position_v"]) ? $context["media_position_v"] : null), "html", null, true));
                    echo "\">
              ";
                    // line 222
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_media((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["content"]) ? $context["content"] : null))));
                    echo "              
            </div>
            <div class=\"media-object-section section-content\">
              ";
                    // line 225
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_title((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["title_prefix"]) ? $context["title_prefix"] : null), (isset($context["title_suffix"]) ? $context["title_suffix"] : null))));
                    echo "
              ";
                    // line 226
                    if ((isset($context["attachment"]) ? $context["attachment"] : null)) {
                        echo "       
                ";
                        // line 227
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_block_attachment", array()), "html", null, true));
                        echo "             
              ";
                    } else {
                        // line 229
                        echo "                ";
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_body((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["content"]) ? $context["content"] : null))));
                        echo "
              ";
                    }
                    // line 231
                    echo "            </div>
          </div>
        ";
                }
                // line 233
                echo "  
        ";
                // line 234
                if ((((isset($context["media_position_h"]) ? $context["media_position_h"] : null) == "right") && ((isset($context["media_float"]) ? $context["media_float"] : null) == false))) {
                    // line 235
                    echo "          <div class=\"media-object stack-for-small\">
            <div class=\"media-object-section section-content\">
              ";
                    // line 237
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_title((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["title_prefix"]) ? $context["title_prefix"] : null), (isset($context["title_suffix"]) ? $context["title_suffix"] : null))));
                    echo "
              ";
                    // line 238
                    if ((isset($context["attachment"]) ? $context["attachment"] : null)) {
                        echo "       
                ";
                        // line 239
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_block_attachment", array()), "html", null, true));
                        echo "             
              ";
                    } else {
                        // line 241
                        echo "                ";
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_body((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["content"]) ? $context["content"] : null))));
                        echo "
              ";
                    }
                    // line 243
                    echo "            </div>
            <div class=\"media-object-section ";
                    // line 244
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["media_position_v"]) ? $context["media_position_v"] : null), "html", null, true));
                    echo "\">
              ";
                    // line 245
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_media((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["content"]) ? $context["content"] : null))));
                    echo "              
            </div>
          </div>
        ";
                }
                // line 248
                echo "     

      ";
            } elseif ((            // line 250
(isset($context["display"]) ? $context["display"] : null) == "display-4")) {
                // line 251
                echo "
        ";
                // line 252
                if ((((isset($context["media_position_h"]) ? $context["media_position_h"] : null) == "default") || (((isset($context["media_position_h"]) ? $context["media_position_h"] : null) != "default") && ((isset($context["media_float"]) ? $context["media_float"] : null) == true)))) {
                    // line 253
                    echo "          ";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_media((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["content"]) ? $context["content"] : null))));
                    echo "
          ";
                    // line 254
                    if ((isset($context["attachment"]) ? $context["attachment"] : null)) {
                        echo "       
            ";
                        // line 255
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_block_attachment", array()), "html", null, true));
                        echo "             
          ";
                    } else {
                        // line 257
                        echo "            ";
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_body((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["content"]) ? $context["content"] : null))));
                        echo "
          ";
                    }
                    // line 259
                    echo "          ";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_title((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["title_prefix"]) ? $context["title_prefix"] : null), (isset($context["title_suffix"]) ? $context["title_suffix"] : null))));
                    echo "  
        ";
                }
                // line 261
                echo "        ";
                if ((((isset($context["media_position_h"]) ? $context["media_position_h"] : null) == "left") && ((isset($context["media_float"]) ? $context["media_float"] : null) == false))) {
                    echo "         
          <div class=\"media-object stack-for-small\">
            <div class=\"media-object-section ";
                    // line 263
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["media_position_v"]) ? $context["media_position_v"] : null), "html", null, true));
                    echo "\">
              ";
                    // line 264
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_media((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["content"]) ? $context["content"] : null))));
                    echo "              
            </div>
            <div class=\"media-object-section section-content\">
              ";
                    // line 267
                    if ((isset($context["attachment"]) ? $context["attachment"] : null)) {
                        echo "       
                ";
                        // line 268
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_block_attachment", array()), "html", null, true));
                        echo "             
              ";
                    } else {
                        // line 270
                        echo "                ";
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_body((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["content"]) ? $context["content"] : null))));
                        echo "
              ";
                    }
                    // line 272
                    echo "              ";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_title((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["title_prefix"]) ? $context["title_prefix"] : null), (isset($context["title_suffix"]) ? $context["title_suffix"] : null))));
                    echo "              
            </div>
          </div>
        ";
                }
                // line 275
                echo "  
        ";
                // line 276
                if ((((isset($context["media_position_h"]) ? $context["media_position_h"] : null) == "right") && ((isset($context["media_float"]) ? $context["media_float"] : null) == false))) {
                    // line 277
                    echo "          <div class=\"media-object stack-for-small\">
            <div class=\"media-object-section section-content\">
              ";
                    // line 279
                    if ((isset($context["attachment"]) ? $context["attachment"] : null)) {
                        echo "       
                ";
                        // line 280
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_block_attachment", array()), "html", null, true));
                        echo "             
              ";
                    } else {
                        // line 282
                        echo "                ";
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_body((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["content"]) ? $context["content"] : null))));
                        echo "
              ";
                    }
                    // line 284
                    echo "              ";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_title((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["title_prefix"]) ? $context["title_prefix"] : null), (isset($context["title_suffix"]) ? $context["title_suffix"] : null))));
                    echo "              
            </div>
            <div class=\"media-object-section ";
                    // line 286
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["media_position_v"]) ? $context["media_position_v"] : null), "html", null, true));
                    echo "\">
              ";
                    // line 287
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_media((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["content"]) ? $context["content"] : null))));
                    echo "              
            </div>
          </div>
        ";
                }
                // line 290
                echo "        

      ";
            } elseif ((            // line 292
(isset($context["display"]) ? $context["display"] : null) == "display-5")) {
                // line 293
                echo "
        ";
                // line 294
                if ((isset($context["attachment"]) ? $context["attachment"] : null)) {
                    echo "       
          ";
                    // line 295
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_block_attachment", array()), "html", null, true));
                    echo "             
        ";
                } else {
                    // line 297
                    echo "          ";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_body((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["content"]) ? $context["content"] : null))));
                    echo "
        ";
                }
                // line 299
                echo "        ";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_title((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["title_prefix"]) ? $context["title_prefix"] : null), (isset($context["title_suffix"]) ? $context["title_suffix"] : null))));
                echo "        
        ";
                // line 300
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_media((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["content"]) ? $context["content"] : null))));
                echo "

      ";
            } else {
                // line 303
                echo "
        ";
                // line 304
                if ((((isset($context["media_position_h"]) ? $context["media_position_h"] : null) == "default") || (((isset($context["media_position_h"]) ? $context["media_position_h"] : null) != "default") && ((isset($context["media_float"]) ? $context["media_float"] : null) == true)))) {
                    // line 305
                    echo "          ";
                    if ((isset($context["attachment"]) ? $context["attachment"] : null)) {
                        echo "       
            ";
                        // line 306
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_block_attachment", array()), "html", null, true));
                        echo "             
          ";
                    } else {
                        // line 308
                        echo "            ";
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_body((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["content"]) ? $context["content"] : null))));
                        echo "
          ";
                    }
                    // line 309
                    echo "        
          ";
                    // line 310
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_media((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["content"]) ? $context["content"] : null))));
                    echo "             
          ";
                    // line 311
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_title((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["title_prefix"]) ? $context["title_prefix"] : null), (isset($context["title_suffix"]) ? $context["title_suffix"] : null))));
                    echo " 
        ";
                }
                // line 313
                echo "        ";
                if ((((isset($context["media_position_h"]) ? $context["media_position_h"] : null) == "left") && ((isset($context["media_float"]) ? $context["media_float"] : null) == false))) {
                    echo "     
          ";
                    // line 314
                    if ((isset($context["attachment"]) ? $context["attachment"] : null)) {
                        echo "       
            ";
                        // line 315
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_block_attachment", array()), "html", null, true));
                        echo "             
          ";
                    } else {
                        // line 317
                        echo "            ";
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_body((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["content"]) ? $context["content"] : null))));
                        echo "
          ";
                    }
                    // line 318
                    echo "   
          <div class=\"media-object stack-for-small\">
            <div class=\"media-object-section ";
                    // line 320
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["media_position_v"]) ? $context["media_position_v"] : null), "html", null, true));
                    echo "\">
              ";
                    // line 321
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_media((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["content"]) ? $context["content"] : null))));
                    echo "              
            </div>
            <div class=\"media-object-section section-content\">              
              ";
                    // line 324
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_title((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["title_prefix"]) ? $context["title_prefix"] : null), (isset($context["title_suffix"]) ? $context["title_suffix"] : null))));
                    echo "              
            </div>
          </div>
        ";
                }
                // line 327
                echo "  
        ";
                // line 328
                if ((((isset($context["media_position_h"]) ? $context["media_position_h"] : null) == "right") && ((isset($context["media_float"]) ? $context["media_float"] : null) == false))) {
                    // line 329
                    echo "          ";
                    if ((isset($context["attachment"]) ? $context["attachment"] : null)) {
                        echo "       
            ";
                        // line 330
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["content"]) ? $context["content"] : null), "field_block_attachment", array()), "html", null, true));
                        echo "             
          ";
                    } else {
                        // line 332
                        echo "            ";
                        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_body((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["content"]) ? $context["content"] : null))));
                        echo "
          ";
                    }
                    // line 333
                    echo " 
          <div class=\"media-object stack-for-small\">
            <div class=\"media-object-section section-content\">
              ";
                    // line 336
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_title((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["title_prefix"]) ? $context["title_prefix"] : null), (isset($context["title_suffix"]) ? $context["title_suffix"] : null))));
                    echo "              
            </div>
            <div class=\"media-object-section ";
                    // line 338
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["media_position_v"]) ? $context["media_position_v"] : null), "html", null, true));
                    echo "\">
              ";
                    // line 339
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["block_macro"]->getblock_media((isset($context["block_content"]) ? $context["block_content"] : null), (isset($context["content"]) ? $context["content"] : null))));
                    echo "              
            </div>
          </div>
        ";
                }
                // line 342
                echo "    

      ";
            }
            // line 345
            echo "
      ";
            // line 346
            if (((isset($context["url"]) ? $context["url"] : null) && (isset($context["filter"]) ? $context["filter"] : null))) {
                // line 347
                echo "        <a href=\"";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true));
                echo "\" class=\"cover\" ";
                if ((isset($context["url_target"]) ? $context["url_target"] : null)) {
                    echo " target=\"_blank\"";
                }
                echo "></a>
      ";
            }
            // line 349
            echo "
      ";
            // line 350
            if (((isset($context["mergin_width"]) ? $context["mergin_width"] : null) == "unexpended")) {
                // line 351
                echo "        </div>
      ";
            }
            // line 353
            echo "    </div>
  </div>
";
        }
    }

    public function getTemplateName()
    {
        return "themes/omni-drupal-theme/omni-portfolio/drupal 8/theme/omni_portfolio/templates/block/block--custom-block.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1069 => 353,  1065 => 351,  1063 => 350,  1060 => 349,  1050 => 347,  1048 => 346,  1045 => 345,  1040 => 342,  1033 => 339,  1029 => 338,  1024 => 336,  1019 => 333,  1013 => 332,  1008 => 330,  1003 => 329,  1001 => 328,  998 => 327,  991 => 324,  985 => 321,  981 => 320,  977 => 318,  971 => 317,  966 => 315,  962 => 314,  957 => 313,  952 => 311,  948 => 310,  945 => 309,  939 => 308,  934 => 306,  929 => 305,  927 => 304,  924 => 303,  918 => 300,  913 => 299,  907 => 297,  902 => 295,  898 => 294,  895 => 293,  893 => 292,  889 => 290,  882 => 287,  878 => 286,  872 => 284,  866 => 282,  861 => 280,  857 => 279,  853 => 277,  851 => 276,  848 => 275,  840 => 272,  834 => 270,  829 => 268,  825 => 267,  819 => 264,  815 => 263,  809 => 261,  803 => 259,  797 => 257,  792 => 255,  788 => 254,  783 => 253,  781 => 252,  778 => 251,  776 => 250,  772 => 248,  765 => 245,  761 => 244,  758 => 243,  752 => 241,  747 => 239,  743 => 238,  739 => 237,  735 => 235,  733 => 234,  730 => 233,  725 => 231,  719 => 229,  714 => 227,  710 => 226,  706 => 225,  700 => 222,  696 => 221,  690 => 219,  687 => 218,  681 => 216,  676 => 214,  672 => 213,  668 => 212,  663 => 211,  661 => 210,  658 => 209,  656 => 208,  650 => 206,  644 => 204,  639 => 202,  635 => 201,  631 => 200,  628 => 199,  626 => 198,  622 => 196,  615 => 193,  611 => 192,  608 => 191,  602 => 189,  597 => 187,  593 => 186,  586 => 183,  584 => 182,  581 => 181,  576 => 179,  570 => 177,  565 => 175,  561 => 174,  555 => 171,  551 => 170,  545 => 168,  542 => 167,  539 => 166,  533 => 164,  528 => 162,  524 => 161,  520 => 160,  515 => 159,  513 => 158,  510 => 157,  508 => 156,  505 => 155,  501 => 153,  499 => 152,  490 => 151,  482 => 150,  479 => 149,  476 => 148,  473 => 147,  470 => 146,  467 => 145,  465 => 144,  462 => 143,  448 => 142,  446 => 141,  441 => 140,  438 => 139,  435 => 138,  432 => 137,  430 => 136,  425 => 135,  423 => 134,  420 => 131,  416 => 129,  408 => 124,  403 => 122,  399 => 121,  393 => 120,  386 => 119,  380 => 118,  377 => 117,  369 => 113,  365 => 112,  359 => 111,  352 => 110,  342 => 109,  340 => 108,  335 => 107,  333 => 106,  328 => 103,  319 => 101,  316 => 100,  313 => 99,  307 => 96,  302 => 95,  296 => 92,  291 => 91,  288 => 90,  282 => 87,  275 => 86,  272 => 85,  269 => 84,  265 => 83,  262 => 82,  258 => 81,  249 => 80,  243 => 77,  240 => 76,  237 => 75,  232 => 74,  226 => 72,  224 => 71,  220 => 70,  212 => 69,  207 => 67,  203 => 66,  197 => 65,  189 => 64,  186 => 63,  179 => 62,  173 => 61,  170 => 60,  167 => 59,  164 => 58,  159 => 57,  157 => 56,  154 => 55,  139 => 54,  136 => 53,  133 => 52,  131 => 51,  127 => 50,  122 => 48,  119 => 45,  117 => 44,  114 => 43,  107 => 41,  103 => 40,  99 => 38,  97 => 37,  93 => 35,  87 => 33,  85 => 32,  77 => 30,  73 => 29,  68 => 27,  62 => 26,  60 => 25,  58 => 24,  54 => 23,  52 => 22,  49 => 19,  47 => 18,  43 => 16,);
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
/* #} */
/* */
/* {% import 'block--macros.html.twig' as block_macro %}*/
/* */
/* {# BASIC SETTING   */
/* ----------------------------------------------------------------#}*/
/* {% set pattern = block_content.field_block_pattern.value %}*/
/* {% set reveal = block_content.field_block_reveal.value %} */
/* {% set padding = block_content.field_block_padding.value %}*/
/* {% set margin = block_content.field_block_margin.value %}*/
/* {% set style %}{% spaceless %}{{ block_macro.block_style(block_content, content) }}{% endspaceless %}{% endset %}*/
/* {% set equal_height = block_content.field_merging_col_height.value %}  */
/* */
/* {% if reveal %}    */
/*   {% set reveal_setting %} {% spaceless %}{{ block_macro.block_reveal(block_content) }}{% endspaceless %}{% endset %}*/
/* {% endif %}*/
/* {% if padding == true %}*/
/*   {% set padding_setting = ' with-padding' %}  */
/* {% else %}*/
/*   {% set padding_setting = ' without-padding' %}*/
/* {% endif %}*/
/* {% if margin == true %}*/
/*   {% set margin_setting = ' with-margin' %}*/
/* {% endif %}*/
/* {% if style %}    */
/*   {% set style_setting %} style="{{ style }}"{% endset %}*/
/* {% endif %}*/
/* */
/* {% if block_content.field_merging_type.value is not empty %}*/
/* */
/*   {# PRINT MERGING BLOCK   */
/*   ----------------------------------------------------------------#}*/
/*   {% set mergin_type = block_content.field_merging_type.value %} */
/* */
/*   {% if mergin_type =='horizontal' %}    */
/*     {% set merging_even = block_content.field_merging_col_width.value %}*/
/*     {% set merging_collapse = block_content.field_merging_collapse.value %}*/
/*     {% set filter = block_content.field_background_filter.value %}*/
/*     {% set class_setting %} {{ pattern }}{% if filter %} with-filter {{ filter }}{% endif %}{{ padding_setting }}{{ margin_setting }}{% if merging_collapse==false %} without-collapse{% endif %}{% endset %}*/
/*     */
/*     {% set column_count = 0 %}*/
/*     {% for i in 1..6 %}*/
/*       {% if content['field_merging_col_' ~ i]|render %}*/
/*         {% set column_count = column_count + 1 %}*/
/*       {% endif %}*/
/*     {% endfor %}*/
/*     {% set merging_setting %}{% spaceless %}{{ block_macro.block_merging_class(block_content, column_count, merging_even) }}{% endspaceless %}{% endset %}*/
/* */
/*     <div id="{{ attributes.id }}" class="block block-custom block-merging merging-horizontal{{ reveal_setting }} {{ attributes.class }}">*/
/*       <div class="inner{{ class_setting }}"{{ style_setting }}>*/
/*         {{ block_macro.block_title(block_content, title_prefix, title_suffix, mergin_type ) }}*/
/*         {{ block_macro.block_body(block_content, content, mergin_type) }}*/
/*         */
/*         <div class="{{ merging_setting }}"{% if equal_height %} data-equalizer{% endif %}>        */
/*           {% if merging_even == true or column_count == 1 or column_count > 4 %}          */
/*             {% if column_count == 1 %}*/
/*               {{ content['field_merging_col_1'] }}*/
/*             {% else %}*/
/*               {% for i in 1..6 %}*/
/*                 {% if content['field_merging_col_' ~ i]|render %}*/
/*                   <div class="column">*/
/*                     {{ content['field_merging_col_' ~ i] }}*/
/*                   </div>*/
/*                 {% endif %}*/
/*               {% endfor %} */
/*             {% endif %}      */
/*           {% else %}          */
/*             {% for i in 1..4 %}*/
/*               {% if content['field_merging_col_' ~ i]|render %}*/
/*                 {% if content['field_merging_col_size_m_' ~ i]|render %}*/
/*                   <div class="{{ content['field_merging_col_size_m_' ~ i] }} {{ content['field_merging_col_size_l_' ~ i] }} column">*/
/*                     {{ content['field_merging_col_' ~ i] }}*/
/*                   </div>*/
/*                 {% else %}*/
/*                   {% if column_count == 3 and i == 3 %}*/
/*                     <div class="{{ content['field_merging_col_size_l_' ~ i] }} column">*/
/*                       {{ content['field_merging_col_' ~ i] }}*/
/*                     </div>*/
/*                   {% else %}*/
/*                     <div class="medium-6 {{ content['field_merging_col_size_l_' ~ i] }} column">*/
/*                       {{ content['field_merging_col_' ~ i] }}*/
/*                     </div>*/
/*                   {% endif %}*/
/*                 {% endif %}*/
/*               {% endif %}*/
/*             {% endfor %}  */
/*           {% endif %}*/
/*         </div>*/
/*       </div>*/
/*     </div>*/
/*   {% elseif mergin_type =='tab' %}*/
/*     {% set mergin_width = block_content.field_merging_width.value %} */
/*     {% set filter = block_content.field_background_filter.value %}*/
/*     {% set class_setting %}{% if filter %} with-filter {{ filter }}{% endif %}{{ padding_setting }}{{ margin_setting }}{% endset %}*/
/*     <div id="{{ attributes.id }}" class="block block-custom block-merging merging-tab{{ reveal_setting }}">         */
/*       <div class="inner{{ class_setting }}"{{ style_setting }}>*/
/*         <div class="{{ mergin_width }} row collapse">*/
/*           {{ content.field_merging_tab }}*/
/*         </div>*/
/*       </div>*/
/*     </div>*/
/*   {% else %} */
/*     {% set class_setting %} {{ padding_setting }}{{ margin_setting }}{% endset %}*/
/*     <div id="{{ attributes.id }}" class="block block-custom block-merging merging-slider{{ reveal_setting }}">         */
/*       <div class="inner{{ class_setting }}"{{ style_setting }}>*/
/*         {{ block_macro.block_title(block_content, title_prefix, title_suffix, mergin_type ) }}*/
/*         {{ block_macro.block_body(block_content, content, mergin_type) }}*/
/*         <div class="showcase showcase-merging">          */
/*           {{ content.field_merging_slider }}          */
/*         </div>*/
/*       </div>*/
/*     </div>*/
/*   {% endif %}*/
/* */
/* {% else %}*/
/* */
/*   {# PRINT CUSTOM BLOCK & ATTACHMENT*/
/*   ----------------------------------------------------------------#}    */
/*   {% set display = block_content.field_block_display.value %}*/
/*   {% set mergin_width = block_content.field_merging_width.value %} */
/*   {% set media_position_h = block_content.field_media_position_horizontal.value %}*/
/*   {% set media_position_v = block_content.field_media_position_vertical.value %}*/
/*   {% set media_float = block_content.field_media_float.value %}*/
/*   {% set filter = block_content.field_background_filter.value %}*/
/*   {% set url = block_content.field_link.uri %}  */
/*   {% set url_target = block_content.field_link_target_blank.value %}*/
/*   {% set class_setting %} {{ display }} {{ pattern }}{% if filter %} with-filter {{ filter }}{% endif %}{{ padding_setting }}{{ margin_setting }}{% endset %}*/
/*   */
/*   {% if block_content.field_block_attachment.value is not empty %}*/
/*     {% set attachment = true %}*/
/*   {% else %}*/
/*     {% set attachment = false %}*/
/*   {% endif %}*/
/* */
/*   <div id="{{ attributes.id }}" class="block block-custom{{ reveal_setting }} {{ attributes.class }}">        */
/*     <div class="inner{{ class_setting }}"{{ style_setting }}{% if equal_height %} data-equalizer-watch{% endif %}> */
/*       {% if mergin_width == 'unexpended' %}*/
/*         <div class="column row">*/
/*       {% endif %}*/
/* */
/*       {% if display == 'display-1' %}*/
/* */
/*         {% if media_position_h == 'default' or (media_position_h != 'default' and media_float == true) %}*/
/*           {{ block_macro.block_title(block_content, title_prefix, title_suffix) }}          */
/*           {{ block_macro.block_media(block_content, content) }}  */
/*           {% if attachment %}       */
/*             {{ content.field_block_attachment }}             */
/*           {% else %}*/
/*             {{ block_macro.block_body(block_content, content) }}*/
/*           {% endif %}*/
/*         {% endif %}*/
/*         {% if media_position_h == 'left' and media_float == false %}*/
/*           {{ block_macro.block_title(block_content, title_prefix, title_suffix) }}*/
/*           <div class="media-object stack-for-small">*/
/*             <div class="media-object-section {{media_position_v}}">*/
/*               {{ block_macro.block_media(block_content, content) }}              */
/*             </div>*/
/*             <div class="media-object-section section-content">*/
/*               {% if attachment %}       */
/*                 {{ content.field_block_attachment }}             */
/*               {% else %}*/
/*                 {{ block_macro.block_body(block_content, content) }}*/
/*               {% endif %}*/
/*             </div>*/
/*           </div>*/
/*         {% endif %}  */
/*         {% if media_position_h == 'right' and media_float == false %}*/
/*           {{ block_macro.block_title(block_content, title_prefix, title_suffix) }}*/
/*           <div class="media-object stack-for-small">*/
/*             <div class="media-object-section section-content">*/
/*               {% if attachment %}       */
/*                 {{ content.field_block_attachment }}             */
/*               {% else %}*/
/*                 {{ block_macro.block_body(block_content, content) }}*/
/*               {% endif %}*/
/*             </div>*/
/*             <div class="media-object-section {{media_position_v}}">*/
/*               {{ block_macro.block_media(block_content, content) }}              */
/*             </div>*/
/*           </div>*/
/*         {% endif %}    */
/* */
/*       {% elseif display == 'display-2' %}*/
/* */
/*         {{ block_macro.block_title(block_content, title_prefix, title_suffix) }}*/
/*         {% if attachment %}       */
/*           {{ content.field_block_attachment }}             */
/*         {% else %}*/
/*           {{ block_macro.block_body(block_content, content) }}*/
/*         {% endif %}*/
/*         {{ block_macro.block_media(block_content, content) }}*/
/* */
/*       {% elseif display == 'display-3' %}*/
/* */
/*         {% if media_position_h == 'default' or (media_position_h != 'default' and media_float == true) %}*/
/*           {{ block_macro.block_media(block_content, content) }}*/
/*           {{ block_macro.block_title(block_content, title_prefix, title_suffix) }}                    */
/*           {% if attachment %}       */
/*             {{ content.field_block_attachment }}             */
/*           {% else %}*/
/*             {{ block_macro.block_body(block_content, content) }}*/
/*           {% endif %}*/
/*         {% endif %}*/
/*         {% if media_position_h == 'left' and media_float == false %}         */
/*           <div class="media-object stack-for-small">*/
/*             <div class="media-object-section {{media_position_v}}">*/
/*               {{ block_macro.block_media(block_content, content) }}              */
/*             </div>*/
/*             <div class="media-object-section section-content">*/
/*               {{ block_macro.block_title(block_content, title_prefix, title_suffix) }}*/
/*               {% if attachment %}       */
/*                 {{ content.field_block_attachment }}             */
/*               {% else %}*/
/*                 {{ block_macro.block_body(block_content, content) }}*/
/*               {% endif %}*/
/*             </div>*/
/*           </div>*/
/*         {% endif %}  */
/*         {% if media_position_h == 'right' and media_float == false %}*/
/*           <div class="media-object stack-for-small">*/
/*             <div class="media-object-section section-content">*/
/*               {{ block_macro.block_title(block_content, title_prefix, title_suffix) }}*/
/*               {% if attachment %}       */
/*                 {{ content.field_block_attachment }}             */
/*               {% else %}*/
/*                 {{ block_macro.block_body(block_content, content) }}*/
/*               {% endif %}*/
/*             </div>*/
/*             <div class="media-object-section {{media_position_v}}">*/
/*               {{ block_macro.block_media(block_content, content) }}              */
/*             </div>*/
/*           </div>*/
/*         {% endif %}     */
/* */
/*       {% elseif display == 'display-4' %}*/
/* */
/*         {% if media_position_h == 'default' or (media_position_h != 'default' and media_float == true) %}*/
/*           {{ block_macro.block_media(block_content, content) }}*/
/*           {% if attachment %}       */
/*             {{ content.field_block_attachment }}             */
/*           {% else %}*/
/*             {{ block_macro.block_body(block_content, content) }}*/
/*           {% endif %}*/
/*           {{ block_macro.block_title(block_content, title_prefix, title_suffix) }}  */
/*         {% endif %}*/
/*         {% if media_position_h == 'left' and media_float == false %}         */
/*           <div class="media-object stack-for-small">*/
/*             <div class="media-object-section {{media_position_v}}">*/
/*               {{ block_macro.block_media(block_content, content) }}              */
/*             </div>*/
/*             <div class="media-object-section section-content">*/
/*               {% if attachment %}       */
/*                 {{ content.field_block_attachment }}             */
/*               {% else %}*/
/*                 {{ block_macro.block_body(block_content, content) }}*/
/*               {% endif %}*/
/*               {{ block_macro.block_title(block_content, title_prefix, title_suffix) }}              */
/*             </div>*/
/*           </div>*/
/*         {% endif %}  */
/*         {% if media_position_h == 'right' and media_float == false %}*/
/*           <div class="media-object stack-for-small">*/
/*             <div class="media-object-section section-content">*/
/*               {% if attachment %}       */
/*                 {{ content.field_block_attachment }}             */
/*               {% else %}*/
/*                 {{ block_macro.block_body(block_content, content) }}*/
/*               {% endif %}*/
/*               {{ block_macro.block_title(block_content, title_prefix, title_suffix) }}              */
/*             </div>*/
/*             <div class="media-object-section {{media_position_v}}">*/
/*               {{ block_macro.block_media(block_content, content) }}              */
/*             </div>*/
/*           </div>*/
/*         {% endif %}        */
/* */
/*       {% elseif display == 'display-5' %}*/
/* */
/*         {% if attachment %}       */
/*           {{ content.field_block_attachment }}             */
/*         {% else %}*/
/*           {{ block_macro.block_body(block_content, content) }}*/
/*         {% endif %}*/
/*         {{ block_macro.block_title(block_content, title_prefix, title_suffix) }}        */
/*         {{ block_macro.block_media(block_content, content) }}*/
/* */
/*       {% else %}*/
/* */
/*         {% if media_position_h == 'default' or (media_position_h != 'default' and media_float == true) %}*/
/*           {% if attachment %}       */
/*             {{ content.field_block_attachment }}             */
/*           {% else %}*/
/*             {{ block_macro.block_body(block_content, content) }}*/
/*           {% endif %}        */
/*           {{ block_macro.block_media(block_content, content) }}             */
/*           {{ block_macro.block_title(block_content, title_prefix, title_suffix ) }} */
/*         {% endif %}*/
/*         {% if media_position_h == 'left' and media_float == false %}     */
/*           {% if attachment %}       */
/*             {{ content.field_block_attachment }}             */
/*           {% else %}*/
/*             {{ block_macro.block_body(block_content, content) }}*/
/*           {% endif %}   */
/*           <div class="media-object stack-for-small">*/
/*             <div class="media-object-section {{media_position_v}}">*/
/*               {{ block_macro.block_media(block_content, content) }}              */
/*             </div>*/
/*             <div class="media-object-section section-content">              */
/*               {{ block_macro.block_title(block_content, title_prefix, title_suffix) }}              */
/*             </div>*/
/*           </div>*/
/*         {% endif %}  */
/*         {% if media_position_h == 'right' and media_float == false %}*/
/*           {% if attachment %}       */
/*             {{ content.field_block_attachment }}             */
/*           {% else %}*/
/*             {{ block_macro.block_body(block_content, content) }}*/
/*           {% endif %} */
/*           <div class="media-object stack-for-small">*/
/*             <div class="media-object-section section-content">*/
/*               {{ block_macro.block_title(block_content, title_prefix, title_suffix) }}              */
/*             </div>*/
/*             <div class="media-object-section {{media_position_v}}">*/
/*               {{ block_macro.block_media(block_content, content) }}              */
/*             </div>*/
/*           </div>*/
/*         {% endif %}    */
/* */
/*       {% endif %}*/
/* */
/*       {% if url and filter %}*/
/*         <a href="{{ url }}" class="cover" {% if url_target %} target="_blank"{% endif %}></a>*/
/*       {% endif %}*/
/* */
/*       {% if mergin_width == 'unexpended' %}*/
/*         </div>*/
/*       {% endif %}*/
/*     </div>*/
/*   </div>*/
/* {% endif %}*/
