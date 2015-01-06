Implement user email change use case.

Use case should be used in 3 places:
- on web page, using symfony form
- on cli using symfony command
- on api endpoint using http request

Additional requirements:
- notify external stats system about user email change (service stats_system)
- notify external marketing system about user email change (service marketing_system)
- change log

You can use existing existins User and UserRepository classes in AppBundle\Model namespace

