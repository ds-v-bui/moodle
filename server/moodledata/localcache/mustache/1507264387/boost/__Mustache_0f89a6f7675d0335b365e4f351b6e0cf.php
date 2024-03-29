<?php

class __Mustache_0f89a6f7675d0335b365e4f351b6e0cf extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';
        $blocksContext = array();

        // 'notifications' section
        $value = $context->find('notifications');
        $buffer .= $this->sectionF68c66a049b69a662a69777bc298f7a5($context, $indent, $value);

        return $buffer;
    }

    private function sectionEb228a6dbdc62698752b2a1176c1133d(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' loggedin, message ';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' loggedin, message ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionFb8e8ddc9ca3702110812af7d06781d6(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (!is_string($value) && is_callable($value)) {
            $source = '{{{.}}}';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $this->resolveValue($context->last(), $context);
                $buffer .= $value;
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section6d1857a05916b17c471fc873f965b0c3(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' loggedoff, message ';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' loggedoff, message ';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionA2b9c9e220d516800d77a9a5c4216229(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
        {{> message/message_preferences_notification_processor }}
    ';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                if ($partial = $this->mustache->loadPartial('message/message_preferences_notification_processor')) {
                    $buffer .= $partial->renderInternal($context, $indent . '        ');
                }
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionF68c66a049b69a662a69777bc298f7a5(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
    <tr data-preference-key="{{preferencekey}}">
        <th>{{displayname}}</th>
        <td class="align-bottom">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span6 col-xs-6">
                        {{#str}} loggedin, message {{/str}}
                        {{#onlinehelphtml}}{{{.}}}{{/onlinehelphtml}}
                    </div>
                    <div class="span6 col-xs-6">
                        {{#str}} loggedoff, message {{/str}}
                        {{#offlinehelphtml}}{{{.}}}{{/offlinehelphtml}}
                    </div>
                </div>
            </div>
        </td>
    </tr>
    {{#processors}}
        {{> message/message_preferences_notification_processor }}
    {{/processors}}
';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '    <tr data-preference-key="';
                $value = $this->resolveValue($context->find('preferencekey'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '">
';
                $buffer .= $indent . '        <th>';
                $value = $this->resolveValue($context->find('displayname'), $context);
                $buffer .= call_user_func($this->mustache->getEscape(), $value);
                $buffer .= '</th>
';
                $buffer .= $indent . '        <td class="align-bottom">
';
                $buffer .= $indent . '            <div class="container-fluid">
';
                $buffer .= $indent . '                <div class="row-fluid">
';
                $buffer .= $indent . '                    <div class="span6 col-xs-6">
';
                $buffer .= $indent . '                        ';
                // 'str' section
                $value = $context->find('str');
                $buffer .= $this->sectionEb228a6dbdc62698752b2a1176c1133d($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '                        ';
                // 'onlinehelphtml' section
                $value = $context->find('onlinehelphtml');
                $buffer .= $this->sectionFb8e8ddc9ca3702110812af7d06781d6($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '                    </div>
';
                $buffer .= $indent . '                    <div class="span6 col-xs-6">
';
                $buffer .= $indent . '                        ';
                // 'str' section
                $value = $context->find('str');
                $buffer .= $this->section6d1857a05916b17c471fc873f965b0c3($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '                        ';
                // 'offlinehelphtml' section
                $value = $context->find('offlinehelphtml');
                $buffer .= $this->sectionFb8e8ddc9ca3702110812af7d06781d6($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '                    </div>
';
                $buffer .= $indent . '                </div>
';
                $buffer .= $indent . '            </div>
';
                $buffer .= $indent . '        </td>
';
                $buffer .= $indent . '    </tr>
';
                // 'processors' section
                $value = $context->find('processors');
                $buffer .= $this->sectionA2b9c9e220d516800d77a9a5c4216229($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
