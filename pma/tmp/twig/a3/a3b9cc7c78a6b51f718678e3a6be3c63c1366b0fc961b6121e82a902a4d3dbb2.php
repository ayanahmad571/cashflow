<?php

/* display/export/option_header.twig */
class __TwigTemplate_f6de64eaa885b2d704d8b8d2fe4a9ab80fe097d479ebd652d97f94595deb0c1d extends Twig_Template
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
        // line 1
        echo "<div class=\"exportoptions\" id=\"header\">
    <h2>
        ";
        // line 3
        echo PhpMyAdmin\Util::getImage("b_export", _gettext("Export"));
        echo "
        ";
        // line 4
        if (((isset($context["export_type"]) ? $context["export_type"] : null) == "server")) {
            // line 5
            echo "            ";
            echo _gettext("Exporting databases from the current server");
            // line 6
            echo "        ";
        } elseif (((isset($context["export_type"]) ? $context["export_type"] : null) == "database")) {
            // line 7
            echo "            ";
            echo twig_escape_filter($this->env, sprintf(_gettext("Exporting tables from \"%s\" database"), (isset($context["db"]) ? $context["db"] : null)), "html", null, true);
            echo "
        ";
        } else {
            // line 9
            echo "            ";
            echo twig_escape_filter($this->env, sprintf(_gettext("Exporting rows from \"%s\" table"), (isset($context["table"]) ? $context["table"] : null)), "html", null, true);
            echo "
        ";
        }
        // line 11
        echo "    </h2>
</div>
";
    }

    public function getTemplateName()
    {
        return "display/export/option_header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 11,  41 => 9,  35 => 7,  32 => 6,  29 => 5,  27 => 4,  23 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "display/export/option_header.twig", "D:\\wamp64\\www\\pma\\templates\\display\\export\\option_header.twig");
    }
}
