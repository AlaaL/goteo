<?php

/*
 * This file is part of the Goteo Package.
 *
 * (c) Platoniq y Fundación Goteo <fundacion@goteo.org>
 *
 * For the full copyright and license information, please view the README.md
 * and LICENSE files that was distributed with this source code.
 */

namespace Goteo\Util\Form;

use Symfony\Component\Form\AbstractExtension;

/**
 * Represents the main form extension, which loads the core functionality.
 *
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class ExtraFieldsExtension extends AbstractExtension
{

    protected function loadTypes()
    {
        return array(
            new Type\MarkdownType(),
            new Type\DatepickerType(),
            new Type\DropfilesType(),
            new Type\BooleanType(),
            new Type\MediaType(),
            new Type\SubmitType(),
        );
    }
}
