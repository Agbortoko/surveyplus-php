# Surveyplus project backend implementation with PHP

[Restricting folder access with .htaccess](https://www.itsolutionstuff.com/post/how-to-restrict-access-to-a-folder-with-htaccessexample.html)

https://www.codingtag.com/htaccess-deny-direct-access-to-folder-in-website

## About .htaccess files

[.htaccess files](https://docs.oracle.com/cd/B14099_19/web.1012/q20206/howto/htaccess.html)

htaccess files (or "distributed configuration files") provide a way to make configuration changes on a per-directory basis. A file, containing one or more configuration directives, is placed in a particular document directory, and the directives apply to that directory, and all subdirectories thereof.

✔️


## Options to Implement

✔️ Means already implemented (or currently working on it)

    2.2.1 Survey Creator
    The application shall allow Survey creators to:
    • [REQ-SC-1] Create a survey ✔️
    • [REQ-SC-2] Update a survey that is unpublished ✔️
    • [REQ-SC-3] Delete a survey that is unpublished ✔️
    • [REQ-SC-4] Add questions to a survey ✔️
    • [REQ-SC-5] Edit questions to a survey that is not yet published✔️
    • [REQ-SC-6] Delete questions in a survey that is not yet published✔️
    • [REQ-SC-7] Publish a survey ✔️
    • [REQ-SC-8] Invite participants via email for Published Survey
    • [REQ-SC-9] View and analyze survey results of published survey
    • [REQ-SC-10] Ability to mark a survey as random to randomly show questions when executing a survey
    2.2.2 Survey Participant
    The application shall allow Survey participants to:
    • [REQ-SP-1] Verify their email access
    • [REQ-SP-2] Execute a Survey
    • [REQ-SP-3] Comment on a Survey
    • [REQ-SC-10] Ability to view randomly survey questions if survey is set to random
    2.2.3 Survey Questions
    • [REQ-SQ-1] Create a survey Question with description and/or images
    • [REQ-SQ-2] Create a survey Question Answer as one choice (Radio) ✔️
    • [REQ-SQ-3] Create a survey Question Answer as multiple choice (checkbox) ✔️
    • [REQ-SQ-4] Create a survey Question Answer as free text ✔️
    2.2.4 Assignment Questions
    • [REQ-AQ-1] Create a survey Question Answer as one choice (Radio)
    • [REQ-AQ-2] Create a survey Question Answer as multiple choice (checkbox)
    • [REQ-AQ-3] Create a survey Question with description and/or images and assign answer
    • [REQ-AQ-4] Show the corrected answers at the end of the assignment



## Issue noticed

Survey table `user_id` does not reference `id` in `user` table but id of the user `profile` ❌

Changed survey `user_id` field name to `profile_id` ✔️