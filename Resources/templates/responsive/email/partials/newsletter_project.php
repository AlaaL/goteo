<?php

$promote = $this->promote;
$project = $this->project;


$url = SITE_URL . '/project/' . $project->id;

?>

<?php
// Only first
if($this->key==0):

?>

<!-- FUNDACION TEST II -->

<table class="section header mt-40" cellpadding="0" cellspacing="0" width="100%" border="0" bgcolor="#ffec61" style="margin-top: 40px;">
    <tr>
        <td class="column" width="150" valign="top">
            <table>
                <tbody>
                    <tr>
                        <td> &nbsp; </td>
                    </tr>
                </tbody>
            </table>
        </td>
        <td class="column" width="300" valign="top">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <h3 class="claim-fundacion" style="text-align: center;margin: 0;padding: 20px 0 20px 60px;line-height: 1.6;">
                                <?= $this->text('newsletter-donate-description') ?>
                            </h3>
                        </td>
                    </tr>
                </tbody>
            </table>
        </td>
        <td class="column" width="150" valign="top">
            <table>
                <tbody>
                    <tr>
                        <td> &nbsp; </td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>
</table>

<!-- FUNDACION TEST -->

<table class="section header" cellpadding="0" cellspacing="0" width="100%" border="0" bgcolor="#ffec61">
    <tr>
        <td class="column" width="420" valign="top">
            <table>
                <tbody>
                    <tr>
                        <td> &nbsp; </td>
                    </tr>
                </tbody>
            </table>
        </td>
        <td class="column" width="100" valign="top">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <p class="pd-fundacion-dos" style="margin: 0;padding: 0px 100px 30px 0px !important;line-height: 1.6;">
                                <a class="btn-fundacion" href="" style="color: #58595b;padding: 6px 12px;background-color: #fff;display: inline-block;margin-bottom: 0;font-size: 14px;font-weight: 400;line-height: 1.42857143;text-align: center;white-space: nowrap;cursor: pointer;border: 1px solid transparent;border-radius: 4px;text-decoration: none;"><?= $this->text('support-our-mission') ?></a>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </td>
        <td class="column" width="200" valign="top">
            <table>
                <tbody>
                    <tr>
                        <td> &nbsp; </td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>
</table>

<!-- Projects title -->

<table class="section" cellpadding="0" cellspacing="0">
    <tr>
        <td class="column" width="100%" valign="top">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <h2 class="title-projects-section" style="margin: 0;padding: 0 20px 20px 20px;line-height: 1.6;font-size: 21px;color: #3a3a3a;text-align: center;margin-top: 35px;margin-bottom: 20px;">Algunos de nuestros Proyectos</h2>                        
                        </td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>
</table>

<?php endif; ?>


<?php if($this->key%2==0): ?>

<table class="section proyectos" cellpadding="0" cellspacing="0" style="margin-bottom: 30px;">

    <tr>

<?php endif; ?>

        <td class="column" width="290" valign="top">
            <table bgcolor="#FFFFFF">
                <tbody>
                    <tr>
                        <td align="left">
                             <?php if ($project->image):

                                $url_imagen = $project->image->getLink(255, 130, true);
                                if (strpos($url_imagen, '//') === 0) {
                                    $url_imagen = 'http://'.substr($url_imagen, 2);
                                }
                                ?>
                            <a href="&lt;?= $url ?&gt;"><img alt="&lt;?= $this-&gt;ee($project-&gt;name) ?&gt;" src="&lt;?= $url_imagen ?&gt;" width="300" height="130" style="max-width: 100%;display: block;"></a>

                            <?php endif ?>

                            <a href="&lt;?= $url ?&gt;" class="title-projects" style="padding-bottom: 20px;padding-top: 10px;padding-left: 20px;font-size: 22px;line-height: 1.;color: #2bbbb7;font-weight: 400;display: block;">
                                <?= $this->ee($project->name) ?>
                            </a>
                            <h4 class="subtitle-projects" style="margin: 0;padding: 0 20px 20px 20px;line-height: 0.8;padding-bottom: 4px;font-size: 15px;font-weight: 400;">
                                <?= $this->text('regular-by') .' ' ?><span style="font-weight: 400; "><?= $project->user->name ?></span>
                            </h4>

                            <?php if($promote->getSocialCommitment()): ?>

                            <p style="margin: 0;padding: 0 20px 20px 20px;line-height: 1.6;"> 
                                <span>
                                    <img class="icons" src="&lt;?= $promote-&gt;getSocialCommitment()-&gt;getIcon()-&gt;getLink(60, 60, false, true) ?&gt;" style="max-width: 100%;display: inline-block;width: 8% !important;">
                                <span class="icon-info" style="padding-bottom: 4px;font-size: 13px;color: #919193;line-height: 0.8;"><?= $promote->getSocialCommitment()->name ?></span>
                            </span></p>
                            <?php endif; ?>

                            <p style="text-align: left;margin: 0;padding: 0 20px 20px 20px;line-height: 1.6;"><?= $project->subtitle ?></p>
                            <p style="padding-bottom: 0px;margin: 0;padding: 0 20px 20px 20px;line-height: 1.6;">
                                <span style="font-size: 20px; font-weight: 500;">
                                <?= \amount_format($project->amount) ?> 
                                </span> <span style="color: #868788;"><?= $this->text('horizontal-project-reached') ?></span></p>
                            <hr style="width: 55%;margin-left: 20px;border: 1px solid #c6cdcc;">
                            <p style="margin: 0;padding: 0 20px 20px 20px;line-height: 1.6;"><span style="font-size: 16px; font-weight: 500;"><?= $project->days.' '.$this->text('regular-days') ?></span> <span style="color: #868788;"><?= $this->text('project-view-metter-days') ?></span></p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </td>

        <?php if($this->key%2==0): ?>

        <td class="column" width="20" valign="top">
            <table>
                <tbody>
                    <tr>
                        <td> &nbsp; </td>
                    </tr>
                </tbody>
            </table>
        </td>

    <?php endif; ?>

<?php if($this->key%2!=0): ?>

    </tr>

</table>

<?php endif; ?>