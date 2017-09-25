<?php

class SiteController extends Controller
{
    public function index()
    {
        $this->data['test_content'] = 'This is the INDEX html';
    }
}
