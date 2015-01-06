Implement user email change use case.

Use case should be used in 3 places:
- on web page, using symfony form - available for actual signed in user
- on cli using symfony command - available for admins
- on api endpoint using http request - available for actual signed in user

Additional requirements:
- notify about change external stats system
- notify about change external marketing system
- change log
- entire email changing process should be secure

Use existing services: user_repository

