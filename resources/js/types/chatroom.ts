type Users = {
    id: number;
    user_id: number;
    chat_room_id: number;
    is_focussed: Boolean;
}

type RoomsProps = {
    id: number;
    name: String;
    user: Array<Users>;
}