<?php

// TODO: nevím jestli nesmazat
interface IView
{
    public function printOutput(array $tplData, string $pageType): string;
}