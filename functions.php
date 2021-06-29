<?php
    function checkbox(string $name, string $value, array $data): string
    {
        $attr = '';

        if(isset($data[$name]) && in_array($value, $data[$name]))
            $attr .= 'checked';
        return <<<HTML
            <input type="checkbox" name="{$name}[]" value="$value" $attr>
        HTML;
    }

    function radio(string $name, string $value, array $data): string
    {
        $attr = '';

        if(isset($data[$name]) && $value==$data[$name])
            $attr .= 'checked';
        return <<<HTML
            <input type="radio" name="$name" value="$value" $attr>
        HTML;
    }

    function ihrEisPrice(array $parfums, array &$ihrEis, int &$ihrPrice, array $data): void
    {
        $x = $data['parfum'];
        if(isset($x))
        {
            foreach( $x as $p)
            {
                if(isset($parfums[$p]))//Si parfum a le key $p
                {
                    $ihrEis[] = $p;
                    $ihrPrice += $parfums[$p];
                }
            }
        }
    }
?>
