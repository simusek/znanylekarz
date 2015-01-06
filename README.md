Implement user email change use case.

Use case should be used in 3 places:
- on web page, using symfony form - available for actual signed in user
- on cli using symfony command - available for admins
- on api endpoint using http request - available for actual signed in user

Additional requirements:
- notify external stats system about user email change
- notify external marketing system about user email change
- change log
- entire email changing process should be secure

Use existing services: user_repository

