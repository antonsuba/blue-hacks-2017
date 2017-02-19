# Blue Hacks 2017

## Terms
User - refers to anyone that will login and use the site

Category - refers to the topic to be discussed between an advisee and advisor

Adviser - refers to users that are considered as experts in their respective category by the site

Advisee - refers to users that intend to ask/ share their concerns and questions in a certain category, and wants to find
          an adviser to advice/ help them through a discussion

Conversation - refers to the discussion and conversation between the adviser and the advisee

Message - refers to each individual user's response in a conversation

## Functions



## Basic Flow

(Note: A user can be both an advisee and an adviser, there is a user_type table that keeps track if they're an advisee or adviser in a certain category. Advisers can only be an adviser in one category)
Advisee-side:
1. Login through Facebook
2. Select a category in which they want to get answers from
3. Send a Message to the site, which the site will then assign an adviser to answer
4. Discuss with the adviser until advisee is satisfied, wished to switch to another category for another conversation, or the conversation is discontinued/ unused by both sides
5. If wishes to visit other conversations, go to 2
6. Logout

Adviser-side:
1. Login through Facebook
2. Select category in which they are an advisor
3. If they don't have any conversation/s with an advisee, wait till they are assigned to one, else skip to 4
4. Select conversations to continue through sending messages for the conversation
5. Either coninue to discuss in a single conversation or move to the next (previous one can still be resumed)
6. Logout

## Third Party APIs
1. Laravel
2. Semantic UI
3. Facebook Login
