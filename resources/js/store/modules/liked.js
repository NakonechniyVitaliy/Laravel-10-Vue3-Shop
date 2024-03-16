    const state = {
        likedCount: null,
    };

    const actions = {
        getLikedCount({ commit }){
            let liked = localStorage.getItem('liked')
            let likedCount = 0;
            liked = JSON.parse(liked)
            liked.forEach(productInLiked =>{
                likedCount++;
            })
            commit('setLikedCount', likedCount)
        },
    };
    const mutations = {
        setLikedCount(state, likedCount){
            state.likedCount = likedCount;
        }
    }
    const getters= {
        likedCount: state => {
            return state.likedCount
        },
    };

 export default {
     state,
     mutations,
     actions,
     getters
 };
