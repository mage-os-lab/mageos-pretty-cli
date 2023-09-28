# Fancy CLI

Improve Magento CLI Ouput Project at Firegento Hackathon Cologne-2023.

## Ideads

* Progress Bars
* Animations
* Emojis
* ASCII Art
* Colors
* Reports, Summary
* Non-ASCII Fallback

## Tasks that could be improved

| Command                                             | Possible Improvement                                             |
|-----------------------------------------------------|------------------------------------------------------------------|
| admin:adobe-ims:disable                             |                                                                  |
| admin:adobe-ims:enable                              |                                                                  |
| admin:adobe-ims:info                                |                                                                  |
| admin:adobe-ims:status                              |                                                                  |
| admin:user:create                                   |                                                                  |
| admin:user:unlock                                   |                                                                  |
| app:config:dump                                     |                                                                  |
| app:config:import                                   |                                                                  |
| app:config:status                                   |                                                                  |
| braintree:migrate                                   |                                                                  |
| cache:clean                                         |                                                                  |
| cache:disable                                       |                                                                  |
| cache:enable                                        |                                                                  |
| cache:flush                                         | Table Output                                                     |
| cache:status                                        | Table Output                                                     |
| catalog:images:resize                               |                                                                  |
| catalog:product:attributes:cleanup                  |                                                                  |
| cms:wysiwyg:restrict                                |                                                                  |
| config:sensitive:set                                |                                                                  |
| config:set                                          |                                                                  |
| config:show                                         |                                                                  |
| cron:install                                        |                                                                  |
| cron:remove                                         |                                                                  |
| cron:run                                            |                                                                  |
| customer:hash:upgrade                               |                                                                  |
| deploy:mode:set                                     |                                                                  |
| deploy:mode:show                                    |                                                                  |
| dev:di:info                                         |                                                                  |
| dev:email:newsletter-compatibility-check            |                                                                  |
| dev:email:override-compatibility-check              |                                                                  |
| dev:profiler:disable                                |                                                                  |
| dev:profiler:enable                                 |                                                                  |
| dev:query-log:disable                               |                                                                  |
| dev:query-log:enable                                |                                                                  |
| dev:source-theme:deploy                             |                                                                  |
| dev:template-hints:disable                          |                                                                  |
| dev:template-hints:enable                           |                                                                  |
| dev:template-hints:status                           |                                                                  |
| dev:tests:run                                       |                                                                  |
| dev:urn-catalog:generate                            |                                                                  |
| dev:xml:convert                                     |                                                                  |
| downloadable:domains:add                            |                                                                  |
| downloadable:domains:remove                         |                                                                  |
| downloadable:domains:show                           |                                                                  |
| encryption:payment-data:update                      |                                                                  |
| i18n:collect-phrases                                |                                                                  |
| i18n:pack                                           |                                                                  |
| i18n:uninstall                                      |                                                                  |
| indexer:info                                        | Table Output                                                     |
| indexer:reindex                                     | Progress Bar                                                     |
| indexer:reset                                       |                                                                  |
| indexer:set-dimensions-mode                         |                                                                  |
| indexer:set-mode                                    |                                                                  |
| indexer:show-dimensions-mode                        |                                                                  |
| indexer:show-mode                                   |                                                                  |
| indexer:status                                      |                                                                  |
| info:adminuri                                       |                                                                  |
| info:backups:list                                   |                                                                  |
| info:currency:list                                  |                                                                  |
| info:dependencies:show-framework                    |                                                                  |
| info:dependencies:show-modules                      |                                                                  |
| info:dependencies:show-modules-circular             |                                                                  |
| info:language:list                                  |                                                                  |
| info:timezone:list                                  |                                                                  |
| inventory:reservation:create-compensations          |                                                                  |
| inventory:reservation:list-inconsistencies          |                                                                  |
| inventory-geonames:import                           |                                                                  |
| maintenance:allow-ips                               |                                                                  |
| maintenance:disable                                 |                                                                  |
| maintenance:enable                                  |                                                                  |
| maintenance:status                                  |                                                                  |
| media-content:sync                                  |                                                                  |
| media-gallery:sync                                  |                                                                  |
| module:config:status                                |                                                                  |
| module:disable                                      |                                                                  |
| module:enable                                       |                                                                  |
| module:status                                       |                                                                  |
| module:uninstall                                    |                                                                  |
| newrelic:create:deploy-marker                       |                                                                  |
| queue:consumers:list                                |                                                                  |
| queue:consumers:start                               |                                                                  |
| remote-storage:sync                                 |                                                                  |
| sampledata:deploy                                   |                                                                  |
| sampledata:remove                                   |                                                                  |
| sampledata:reset                                    |                                                                  |
| security:recaptcha:disable-for-user-forgot-password |                                                                  |
| security:recaptcha:disable-for-user-login           |                                                                  |
| setup:backup                                        |                                                                  |
| setup:config:set                                    |                                                                  |
| setup:db-data:upgrade                               |                                                                  |
| setup:db-declaration:generate-patch                 |                                                                  |
| setup:db-declaration:generate-whitelist             |                                                                  |
| setup:db-schema:upgrade                             |                                                                  |
| setup:db:status                                     |                                                                  |
| setup:di:compile                                    | Already has progress bar, how to improve? Add Result Overview?   |
| setup:install                                       |                                                                  |
| setup:performance:generate-fixtures                 |                                                                  |
| setup:rollback                                      |                                                                  |
| setup:static-content:deploy                         | Already has progress bar, how to improve? Add Result Overview?   |
| setup:store-config:set                              |                                                                  |
| setup:uninstall                                     |                                                                  |
| setup:upgrade                                       | Progress Bar                                                     |
| store:list                                          | Already is table output                                          |
| store:website:list                                  | Already is table output                                          |
| theme:uninstall                                     |                                                                  |
| varnish:vcl:generate                                |                                                                  |


## Links

* https://symfony.com/doc/current/components/console/helpers/progressbar.html
* https://magecomp.com/blog/add-progress-bar-using-custom-cli-command-magento-2/
* https://symfony.com/doc/current/components/console/helpers/progressindicator.html


