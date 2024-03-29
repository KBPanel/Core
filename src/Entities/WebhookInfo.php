<?php

namespace PHPBotts\Core\Entities;

/**
 * Class WebhookInfo
 *
 * @link https://core.telegram.org/bots/api#webhookinfo
 *
 * @method string   getUrl()                          Webhook URL, may be empty if webhook is not set up
 * @method bool     getHasCustomCertificate()         True, if a custom certificate was provided for webhook certificate checks
 * @method int      getPendingUpdateCount()           Number of updates awaiting delivery
 * @method string   getIpAddress()                    Optional. Currently used webhook IP address
 * @method int      getLastErrorDate()                Optional. Unix time for the most recent error that happened when trying to deliver an update via webhook
 * @method string   getLastErrorMessage()             Optional. Error message in human-readable format for the most recent error that happened when trying to deliver an update via webhook
 * @method int      getLastSynchronizationErrorDate() Optional. Unix time of the most recent error that happened when trying to synchronize available updates with Telegram datacenters
 * @method int      getMaxConnections()               Optional. Maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery
 * @method string[] getAllowedUpdates()               Optional. A list of update types the bot is subscribed to. Defaults to all update types
 */
class WebhookInfo extends Entity
{

}
