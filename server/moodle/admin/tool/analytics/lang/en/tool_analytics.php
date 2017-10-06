<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Strings for tool_analytics.
 *
 * @package tool_analytics
 * @copyright 2016 David Monllao {@link http://www.davidmonllao.com}
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['accuracy'] = 'Accuracy';
$string['allpredictions'] = 'All predictions';
$string['analysingsitedata'] = 'Analysing the site';
$string['analyticmodels'] = 'Analytic models';
$string['bettercli'] = 'Evaluating models and generating predictions may involve heavy processing. It is recommended to run these actions from the command line.';
$string['cantguessstartdate'] = 'Can\'t guess the start date';
$string['cantguessenddate'] = 'Can\'t guess the end date';
$string['clienablemodel'] = 'You can enable the model by selecting a time-splitting method by its ID. Note that you can also enable it later using the web interface (\'none\' to exit).';
$string['clievaluationandpredictions'] = 'A cron task iterates through enabled models and gets predictions. Models evaluation via command line is disabled. You can allow these processes to be executed manually via web interface by enabling <a href="{$a}">\'onlycli\' analytics setting</a>';
$string['editmodel'] = 'Edit "{$a}" model';
$string['edittrainedwarning'] = 'This model has already been trained. Note that changing its indicators or its time-splitting method will delete its previous predictions and start generating new predictions.';
$string['enabled'] = 'Enabled';
$string['errorcantenablenotimesplitting'] = 'You need to select a time-splitting method before enabling the model';
$string['errornoenabledandtrainedmodels'] = 'There are no enabled and trained models to predict.';
$string['errornoenabledmodels'] = 'There are no enabled models to train.';
$string['errornoexport'] = 'Only trained models can be exported';
$string['errornostaticedit'] = 'Models based on assumptions cannot be edited.';
$string['errornostaticevaluated'] = 'Models based on assumptions cannot be evaluated. They are always 100% correct according to how they were defined.';
$string['errornostaticlog'] = 'Models based on assumptions cannot be evaluated because there is no performance log.';
$string['erroronlycli'] = 'Execution only allowed via command line';
$string['errortrainingdataexport'] = 'The model training data could not be exported';
$string['evaluate'] = 'Evaluate';
$string['evaluatemodel'] = 'Evaluate model';
$string['evaluationinbatches'] = 'The site contents are calculated and stored in batches. The evaluation process may be stopped at any time. The next time it is run, it will continue from the point when it was stopped.';
$string['export'] = 'Export';
$string['exporttrainingdata'] = 'Export training data';
$string['getpredictionsresultscli'] = 'Results using {$a->name} (id: {$a->id}) course duration splitting';
$string['getpredictionsresults'] = 'Results using {$a->name} course duration splitting';
$string['extrainfo'] = 'Info';
$string['generalerror'] = 'Evaluation error. Status code {$a}';
$string['getpredictions'] = 'Get predictions';
$string['goodmodel'] = 'This is a good model for using to obtain predictions. Enable it to start obtaining predictions.';
$string['indicators'] = 'Indicators';
$string['info'] = 'Info';
$string['insights'] = 'Insights';
$string['loginfo'] = 'Log extra info';
$string['modelresults'] = '{$a} results';
$string['modelslist'] = 'Models list';
$string['modeltimesplitting'] = 'Time splitting';
$string['nodatatoevaluate'] = 'There is no data to evaluate the model';
$string['nodatatopredict'] = 'No new elements to get predictions for';
$string['nodatatotrain'] = 'There is no new data that can be used for training';
$string['notdefined'] = 'Not yet defined';
$string['pluginname'] = 'Analytic models';
$string['predictionresults'] = 'Prediction results';
$string['predictmodels'] = 'Predict models';
$string['predictorresultsin'] = 'Predictor logged information in {$a} directory';
$string['predictionprocessfinished'] = 'Prediction process finished';
$string['samestartdate'] = 'Current start date is good';
$string['sameenddate'] = 'Current end date is good';
$string['target'] = 'Target';
$string['trainandpredictmodel'] = 'Training model and calculating predictions';
$string['trainingprocessfinished'] = 'Training process finished';
$string['trainingresults'] = 'Training results';
$string['trainmodels'] = 'Train models';
$string['viewlog'] = 'Log';
$string['weeksenddateautomaticallyset'] = 'End date automatically set based on start date and the number of sections';
$string['weeksenddatedefault'] = 'End date automatically calculated from the course start date.';
